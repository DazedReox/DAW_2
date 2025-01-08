api_url = "https://api.api-ninjas.com/v1/randomimage";

const app = Vue.createApp({
    data(){
        return{
            title: "Titulo con Vue",
            message: "Mensaje 1",
            age : 26,
            showAge : false,
            nameList:[],
            inputContent: "Añade un nombre"
        }
    },
    methods:{
        pressed(){
            this.nameList.push(this.inputContent);
            this.inputContent = "";
        },
        deleteElement(pos){
            this.nameList.splice(pos,1);
        },
        deleteInput(){
            this.inputContent = "";
        }
    }
})
app.mount("#app")