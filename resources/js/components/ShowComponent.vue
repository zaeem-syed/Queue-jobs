<template>
    <div>
        <table>
            <tr>
                <td>Name</td>
                <td>Price</td>
                <td>Description</td>
            </tr>
            <tbody>
                <tr v-for="product in Products" :key="product.id">
                    <td>{{product.name}}</td>
                </tr>
            </tbody>


        </table>


    </div>
</template>

<script>
export default({
    props:['Product'],
    data(){
        return {
           Products:this.Product,

        }
    },
    // mounted (){
    //     console.log(props);
    // },



});

</script>
