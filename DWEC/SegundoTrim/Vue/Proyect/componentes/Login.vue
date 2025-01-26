import{createUserWithEmailAndPassword} from "firebase/auth";


async function login(email, password){
    try{
      const userCredential = await signInWithEmailAndPassword(auth, email, password);
      console.log("Loggin completado: ", userCredential.user);
    }catch (error){
      console.error("Error al loguearse: ", error.message);
    }
}