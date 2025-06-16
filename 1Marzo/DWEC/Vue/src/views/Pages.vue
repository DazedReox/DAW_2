<template>
  <component :is="currentPage" />
</template>

<script setup>
import { computed } from 'vue'
import { useRouter, RouterLink } from 'vue-router'
import { auth, db, provider } from '../firebase'
import { signInWithPopup, signInWithEmailAndPassword, createUserWithEmailAndPassword } from 'firebase/auth'
import { collection, query, where, getDocs, doc, getDoc} from 'firebase/firestore'
import PropertyCard from '../components/PropertyCard.vue'
import PropertyForm from '../components/PropertyForm.vue'

const props = defineProps(['page', 'id'])
const router = useRouter()

const currentPage = computed(() => {
  switch (props.page) {
    case 'home': return Home
    case 'offers': return Offers
    case 'profile': return Profile
    case 'login': return Login
    case 'register': return Register
    case 'detail': return PropertyDetails
    default: return Home
  }
})

const Home = {
  components: { PropertyCard, RouterLink },
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
    try {
      const q = query(collection(db, 'properties'), where('offer', '==', true))
      const snap = await getDocs(q)
      const docs = snap.docs.map(d => ({ id: d.id, ...d.data() }))
      if (docs.length > 0) {
        this.offer = docs[Math.floor(Math.random() * docs.length)]
      }
    } catch (error) {
      console.error('Error al cargar :', error)
    }
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
    try {
      const q = query(collection(db, 'properties'), where('offer', '==', true))
      const snap = await getDocs(q)
      this.offers = snap.docs.map(d => ({ id: d.id, ...d.data() }))
    } catch (error) {
      console.error('Error al cargar:', error)
    }
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
      try {
        const snap = await getDocs(collection(db, 'properties'))
        this.myProps = snap.docs.map(d => ({ id: d.id, ...d.data() }))
      } catch (error) {
        console.error('Error al cargar:', error)
      }
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
    <div v-else>
      <p>Propiedad no encontrada</p>
    </div>
  `,
  data() {
    return { prop: null }
  },
  async mounted() {
    try {
      const docRef = doc(db, 'properties', props.id)
      const snap = await getDoc(docRef)
      this.prop = snap.exists() ? { id: snap.id, ...snap.data() } : null
    } catch (error) {
      console.error('Error al cargar:', error)
    }
  }
}

const Login = {
  template: `
    <div class="grid gap-2 max-w-sm mx-auto mt-4">
      <input v-model="email" placeholder="Email" />
      <input v-model="pass" type="password" placeholder="Contraseña" />
      <button @click="loginEmail" class="bg-blue-500 text-white px-4 py-2 rounded">Entrar</button>
      <button @click="loginGoogle" class="bg-red-500 text-white px-4 py-2 rounded">Entrar con Google</button>
    </div>
  `,
  data() {
    return { email: '', pass: '' }
  },
  methods: {
    async loginEmail() {
      try {
        await signInWithEmailAndPassword(auth, this.email, this.pass)
        router.push('/profile')
      } catch (error) {
        console.error('Error login:', error)
        alert('Error al iniciar sesión')
      }
    },
    async loginGoogle() {
      try {
        await signInWithPopup(auth, provider)
        router.push('/profile')
      } catch (error) {
        console.error('Error Google login:', error)
        alert('Error al iniciar sesión con Google')
      }
    }
  }
}

const Register = {
  template: `
    <div class="grid gap-2 max-w-sm mx-auto mt-4">
      <input v-model="email" placeholder="Email" />
      <input v-model="pass" type="password" placeholder="Contraseña" />
      <button @click="register" class="bg-green-500 text-white px-4 py-2 rounded">Registrarse</button>
    </div>
  `,
  data() {
    return { email: '', pass: '' }
  },
  methods: {
    async register() {
      try {
        await createUserWithEmailAndPassword(auth, this.email, this.pass)
        router.push('/profile')
      } catch (error) {
        console.error('Error al registrarse:', error)
        alert('Error al registrarse')
      }
    }
  }
}
</script>