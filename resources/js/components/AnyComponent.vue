<template>
<div>
<h1> here are Products</h1>

<table>
<tr>
    <td>Product Name</td>
    <td>Description </td>
    <td>Category</td>
    <td>Price</td>
    <td>show</td>
</tr>
<tbody>
    <tr v-for="products in product" :key="products.id">
        <td>{{products.name}}</td>
        <td>{{products.description}}</td>
        <td >

            <p v-for="category in products.category" :key="category.id">
                 {{category.name}}/
            </p>


        </td>
        <td>{{products.price}}</td>
        <td><button @click.prevent="show(products.slug)">Show </button></td>
    </tr>
</tbody>


</table>

</div>




</template>



<script>
//import axios from "axios";

export default({
    data()
    {
        return {
            product:[],
            cart:[],
            order:{},

        }
    },
    mounted(){
       axios.get('/api/products').then(response=>{
        this.product=response.data;
       })
    },
    methods:{
        updateproduct(product){
            this.product=product;
        },
        addToCart(product)
        {
            let productInCartIndex=cart.findIndex(item => item.slug === product.slug);
            if (productInCartIndex !== -1){
                cart[productInCartIndex].quantity++;
                return;
            }
            product.quantity=1;
            this.cart.push(product);
        },
        removeFromCart(index)
        {
            cart.splice(index,1);
        },
        updateorder(order){
            this.order=order;

        },
        updateCart(cart){
            this.cart=cart;
        },
        clearcart(){
            this.cart='';
        },
        show(value)
        {
            window.location.href="product/"+value;
        }


    }


});


</script>
