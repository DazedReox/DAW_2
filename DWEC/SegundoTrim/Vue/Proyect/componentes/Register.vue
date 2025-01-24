

async function register(email, password){
    try{
      const userCredential = await createUserWithEmailAndPassword(auth, email, password);
      console.log("Usuario registrado: ", userCredential.user);
    }catch (error){
      console.error("Error al registrarse: ", error.message);
    }
}