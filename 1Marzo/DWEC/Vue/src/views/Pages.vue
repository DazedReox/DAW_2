<template>
  <div>
    <Navbar />
    <div class="pt-20 px-4 max-w-4xl mx-auto">
      <component :is="currentPage" />
    </div>
  </div>
</template>

<script setup>
import { computed } from 'vue'
import { useRouter } from 'vue-router'
import { auth, db, provider } from '../firebase'
import { signInWithPopup, signInWithEmailAndPassword, createUserWithEmailAndPassword } from 'firebase/auth'
import { collection, query, where, getDocs, doc, getDoc } from 'firebase/firestore'

import Navbar from '../components/Common.vue'
import PropertyCard from '../components/PropertyCard.vue'
import PropertyForm from '../components/PropertyForm.vue'

const props = defineProps(['page', 'id'])

const currentPage = computed(() => {
  switch (props.page) {
    case 'home': return Home
    case 'offers': return Offers
    case 'profile': return Profile
    case 'detail': return PropertyDetails
    case 'login': return Login
    case 'register': return Register
    default: return Home
  }
})

// --- Componentes internos para las vistas ---

const Home = {
  components: { PropertyCard },
  template: `
    <div>
      <h1 class="text-xl font-bold mb-4">Vivienda en oferta</h1>
      <PropertyCard v-if="offer" :property="offer" />
      <div class="mt-6 space-x-4">
        <RouterLink to="/offers" class="text-blue-500 underline">Ver todas las ofertas</RouterLink>
        <RouterLink to="/profile" class="text-blue-500 underline">Mis propiedades</RouterLink>
      </div>
    </div>
  `,
  data() {
    return { offer: null }
  },
  async mounted() {
    const q = query(collection(db, 'properties'), where('offer', '==', true))
    const snap = await getDocs(q)
    const docs = snap.docs.map(d => ({ id: d.id, ...d.data() }))
    this.offer = docs[Math.floor(Math.random() * docs.length)]
  }
}

const Offers = {
  components: { PropertyCard },
  template: `
    <div>
      <h1 class="text-xl font-bold mb-4">Ofertas disponibles</h1>
      <div class="grid gap-4">
        <PropertyCard v-for="p in offers" :key="p.id" :property="p" />
      </div>
    </div>
  `,
  data() {
    return { offers: [] }
  },
  async mounted() {
    const q = query(collection(db, 'properties'), where('offer', '==', true))
    const snap = await getDocs(q)
    this.offers = snap.docs.map(d => ({ id: d.id, ...d.data() }))
  }
}

const Profile = {
  components: { PropertyCard, PropertyForm },
  template: `
    <div>
      <h1 class="text-xl font-bold mb-4">Mis propiedades</h1>
      <div class="grid gap-4">
        <PropertyCard v-for="p in myProps" :key="p.id" :property="p" />
      </div>
      <h2 class="text-lg font-semibold mt-6">Nueva propiedad</h2>
      <PropertyForm @submitted="loadMyProps" />
    </div>
  `,
  data() {
    return { myProps: [] }
  },
  methods: {
    async loadMyProps() {
      const snap = await getDocs(collection(db, 'properties'))
      this.myProps = snap.docs.map(d => ({ id: d.id, ...d.data() }))
    }
  },
  mounted() {
    this.loadMyProps()
  }
}

const PropertyDetails = {
  template: `
    <div v-if="prop">
      <h1 class="text-xl font-bold">{{ prop.name }}</h1>
      <img v-for="img in prop.imageUrls" :key="img" :src="img" class="w-full my-2 max-w-md" />
      <p>{{ prop.address }}</p>
      <p>{{ prop.type }} - {{ prop.price }}€</p>
      <p>Dormitorios: {{ prop.bedrooms }}, Baños: {{ prop.bathrooms }}</p>
      <p v-if="prop.offer">Descuento: {{ prop.discount }}%</p>
    </div>
  `,
  data() {
    return { prop: null }
  },
  async mounted() {
    const docRef = doc(db, 'properties', props.id)
    const snap = await getDoc(docRef)
    this.prop = snap.exists() ? { id: snap.id, ...snap.data() } : null
  }
}

const Login = {
  template: `
    <div class="grid gap-2 max-w-sm mx-auto">
      <input v-model="email" placeholder="Email" />
      <input v-model="pass" type="password" placeholder="Contraseña" />
      <button @click="loginEmail">Entrar</button>
      <button @click="loginGoogle">Entrar con Google</button>
    </div>
  `,
  data() {
    return { email: '', pass: '' }
  },
  methods: {
    async loginEmail() {
      await signInWithEmailAndPassword(auth, this.email, this.pass)
      this.$router.push('/profile')
    },
    async loginGoogle() {
      await signInWithPopup(auth, provider)
      this.$router.push('/profile')
    }
  }
}

const Register = {
  template: `
    <div class="grid gap-2 max-w-sm mx-auto">
      <input v-model="email" placeholder="Email" />
      <input v-model="pass" type="password" placeholder="Contraseña" />
      <button @click="register">Registrarse</button>
    </div>
  `,
  data() {
    return { email: '', pass: '' }
  },
  methods: {
    async register() {
      await createUserWithEmailAndPassword(auth, this.email, this.pass)
      this.$router.push('/profile')
    }
  }
}
</script>
