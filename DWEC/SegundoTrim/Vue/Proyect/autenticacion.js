
import { signOut } from "firebase/auth";
import { signInWithEmailAndPassword } from "firebase/auth";





async function logout() {
    await signOut(auth);
    console.log("Sesion cerrada");
}
