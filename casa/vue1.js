api_url = "https://api.api-ninjas.com/v1/randomimage";

const app = Vue.createApp({
    data(){
        return{
            title: "Titulo con Vue",
            message: "Mensaje 1",
            age : 26,
            showAge : false,
            nameList:[],
            inputContent: "Añade un nombre",

            itemName: null,
            itemNumber: null,
            shoppingList: [{
                name: 'Tomatoes', number: 5
            }]
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
        },
        addItem(){
            let item = {
                name : this.itemName,
                number : this.itemNumber
            }
            this.shoppingList.push(item);
            this.itemName = null;
            this.itemNumber = null;

            //this.shoppingList.push(this.itemName, this.itemNumber);
            //this.itemName = "";
            //this.itemNumber = "";
        },
        pressed2(){
            this.shoppingList.push(item);
            this.itemName = null;
            this.itemNumber = null;
        },
        deleteElement2(pos){
            this.shoppingList.splice(pos,1);
        }
    }
})
app.mount("#app")