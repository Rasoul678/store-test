<script src="{{ asset('frontend/js/jquery-2.0.0.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('frontend/plugins/fancybox/fancybox.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('frontend/plugins/owlcarousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('frontend/js/script.js') }}" type="text/javascript"></script>
<script>$('div.alert').not('.alert-important, .custom-error').delay(2800).fadeOut(800);</script>
<!--Flyto js -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script src="{{ asset('frontend/js/flyto.js') }}"></script>
<script>
      $('.items').flyto({
            item      : 'li',
            target    : '.cart',
            button    : '.my-btn'
      });
</script>
<!--/ js -->
<script>
    const forms = document.querySelectorAll('#addToCart');
    forms.forEach(form =>{
        form.addEventListener('submit', function(e){
              e.preventDefault();
              // console.log('clicked');
              const formData = new FormData(this);
              // console.log([...formData.keys()]);
              fetch('{{route('cart.add')}}', {
                    method: 'post',
                    body: formData,
              }).then(response =>{
                    return response.text();
              }).catch(error =>{
                    console.error(error);
              })
        });
    });

    const buttons = document.querySelectorAll('#addToCart button');
    buttons.forEach(btn =>{
          btn.addEventListener('click', function(){
                // console.log(this);
                let parent = this.parentElement;

                while (!parent.classList.contains('card-product')){
                      parent = parent.parentElement;
                }

                let target = parent.querySelector('.my-btn');
                // console.log(target);
                target.click();
          })
    })
</script>