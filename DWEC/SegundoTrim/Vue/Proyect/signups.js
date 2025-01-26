import{GoogleAuthProvider, signInWithPopup} from "firebase/auth";

async function loginWithGoogle(){
    const provider = new GoogleAuthProvider();
    try{
        const result = await signInWithPopup(auth, provider);
        console.log("Usuario logueado con google: ", result.user);
    }catch(error){
        console.error("Error al logearse con google: ", error.message);
    }
}

import{GithubAuthProvider, signInWithPopup} from "firebase/auth";

async function loginWithGithub(){
    const provider = new GithubAuthProvider();
    try{
        const result = await signInWithPopup(auth, provider);
        console.log("Sesion iniciada correctamente con github:", result.user);
    }catch(error){
        console.error("Error al logearse con github:", error.message);
    }
}
