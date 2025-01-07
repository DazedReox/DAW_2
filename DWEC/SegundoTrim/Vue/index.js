const app = Vue.createApp(
    {
        data(){
            return{
                message: "hello world",
                titulo: "primera prueba con vue",
                edad: 30,
                mostrarEdad : true,
                contanidoDelInput:"Escribe algo",
                listaNombres: ["Gorka", "Pepito"],
            }
        },

        methods:
        {
            pulsar(){
                this.listaNombres.push(this.contenidoDelInput);
                this.contenidoDelInput ="";
            },
            borrarElemento(pos){
                console.log("borrando en posicion="+pos);

                this.listaNombres.splice(pos,1);
            }
        }
    }
)
app.mount("#app")