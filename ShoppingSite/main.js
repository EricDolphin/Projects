let carts = document.querySelectorAll('.add-cart');

/* An array is made to store the items info*/

let products = [
	{
		name: 'Shoes',
		tag: 'shoes',
		price: 40,
		inCart: 0
	},
	{
		name: 'Pair of Hoodies',
		tag: 'hoodies',
		price: 80,
		inCart: 0
	},
	{
		name: 'White Designer Hoodie',
		tag: 'white-hoodie',
		price: 45,
		inCart: 0
	},
	{
		name: 'Graphic Hoodie-Flames',
		tag: 'flame-hoodie',
		price: 45,
		inCart: 0
	}
]
/* This runs through the different items to get the information necessary*/
for (let i=0; i < carts.length; i++) {
	carts[i].addEventListener('click',() => {
		cartNum(products[i]);
		totalCost(products[i]);
	})
}
/*This is used to load cart values that are stored after refreshing the page*/
function onLoadCartNumbers() {
	let productNum = localStorage.getItem('cartNum');
	
	if(productNum) {
		document.querySelector('.cart span').textContent = productNum;
	}
}

/*This is used to store the amount in a cart*/
function cartNum(products) {
	let productNum = localStorage.getItem('cartNum');
	productNum = parseInt(productNum);
	
	if(productNum) {
		localStorage.setItem('cartNum', productNum + 1);
		document.querySelector('.cart span').textContent = productNum + 1;
	} else {
		localStorage.setItem('cartNum', 1);
		document.querySelector('.cart span').textContent = 1;
	}
	setItems(products);
}
/*This is used to set which items are being added to the cart*/
function setItems(products) {
	let cartItems = localStorage.getItem('productsInCart');
	cartItems = JSON.parse(cartItems);
	
	if(cartItems != null) {
		
		if(cartItems[products.tag] == undefined){
			cartItems = {
				...cartItems,
			[products.tag]: products
			}
		}
		cartItems[products.tag].inCart += 1;
	} else {
		products.inCart = 1;
		cartItems = {
			[products.tag]: products
		}
	}
	
	
	localStorage.setItem("productsInCart", JSON.stringify(cartItems));
}
/* Tallies up the total cost of items*/
function totalCost(products) {
	console.log("The product price is", products.price);
	let cartCost = localStorage.getItem('totalCost');

	console.log("my cartCost is", cartCost);
	
	if(cartCost != null) {
		cartCost = parseInt(cartCost);
		localStorage.setItem("totalCost", cartCost + products.price);
	} else {	
	localStorage.setItem("totalCost", products.price);
	}
}
/*Displays the cart in the cart page*/
function displayCart() {
	let cartItems = localStorage.getItem("productsInCart");
	cartItems = JSON.parse(cartItems);
	let productContainer = document.querySelector(".products");
	if(cartItems && productContainer) {
		productContainer.innerHTML = '';
		Object.values(cartItems).map(item => {
			productContainer.innerHTML += `
			<div class="product">
				<ion-icon name="close-circle"></ion-icon>
				<img src="./images/${item.tag}.jpg">
				${item.name}
			</div>
			<div class="price">
				Price per: ${item.price}
			</div>
			<div class="quantity"> 
				Amount: ${item.inCart}
			</div>
			<div class="total">
				Total: ${item.inCart * item.price}
			</div>
			
			`
			});
			
		}
}
/*Runs these 2 functions as soon as the page is loaded*/
onLoadCartNumbers();
displayCart();