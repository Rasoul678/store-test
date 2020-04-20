// Show cart icon on navbar in different responsive screen
const cartSmallScreen = document.querySelector('.small-sc i');
const cartBigScreen = document.querySelector('.big-sc i');
if(window.innerWidth < 767){
      cartSmallScreen.classList.add('cart');
      cartBigScreen.classList.remove('cart');
}else{
      cartSmallScreen.classList.remove('cart');
      cartBigScreen.classList.add('cart');
};

// // reload the page on screen change for cart icon movement
// window.addEventListener("resize", ()=>{
//       if(window.innerWidth < 767){
//             window.location.reload();
//       };
// });

// Fly to cart script
$('.items').flyto({
      item      : 'li',
      target    : '.cart',
      button    : '.my-btn'
});

// Add to cart  fly on submit form
const buttons = document.querySelectorAll('#addToCart button');
buttons.forEach(btn =>{
      btn.addEventListener('click', function(){
            // console.log(this);
            let parent = this.parentElement;

            while (!parent.classList.contains('card-product')){
                  parent = parent.parentElement;
            };

            let target = parent.querySelector('.my-btn');
            // console.log(target);
            target.click();
      });
});