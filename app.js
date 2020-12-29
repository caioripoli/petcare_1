// Header toggle

function toggleNav() {
  let burger = document.querySelector('.burger');
  let menu = document.querySelector('.menu');
  let links = document.querySelectorAll('.menu ul li');

  burger.classList.toggle('toggle');
  menu.classList.toggle('menu-active');

  overlay.addEventListener('click', () => {
    burger.classList.remove('toggle');
    menu.classList.remove('menu-active');
  });

  links.forEach(e => {
    e.addEventListener('click', () => {
      burger.classList.remove('toggle');
      menu.classList.remove('menu-active');
    })
  })
}

// Identificar o clique no menu
// Verificar o item que foi clicado e fazer referência com o alvo
// Verificar a distância entre o alvo e o topo
// Animar o scroll até o alvo

const menuItems = document.querySelectorAll('.menu a[href^="#"]');

function getScrollTopByHref(element) {
	const id = element.getAttribute('href');
	return document.querySelector(id).offsetTop;
}

function scrollToPosition(to) {
  // Caso queira o nativo apenas
	// window.scroll({
	// top: to,
	// behavior: "smooth",
	// })
  smoothScrollTo(0, to);
}

function scrollToIdOnClick(event) {
	event.preventDefault();
	const to = getScrollTopByHref(event.currentTarget) - 120;
	scrollToPosition(to);
}

menuItems.forEach(item => {
	item.addEventListener('click', scrollToIdOnClick);
});

// Caso deseje suporte a browsers antigos / que não suportam scroll smooth nativo
/**
 * Smooth scroll animation
 * @param {int} endX: destination x coordinate
 * @param {int) endY: destination y coordinate
 * @param {int} duration: animation duration in ms
 */
function smoothScrollTo(endX, endY, duration) {
  const startX = window.scrollX || window.pageXOffset;
  const startY = window.scrollY || window.pageYOffset;
  const distanceX = endX - startX;
  const distanceY = endY - startY;
  const startTime = new Date().getTime();

  duration = typeof duration !== 'undefined' ? duration : 400;

  // Easing function
  const easeInOutQuart = (time, from, distance, duration) => {
    if ((time /= duration / 2) < 1) return distance / 2 * time * time * time * time + from;
    return -distance / 2 * ((time -= 2) * time * time * time - 2) + from;
  };

  const timer = setInterval(() => {
    const time = new Date().getTime() - startTime;
    const newX = easeInOutQuart(time, startX, distanceX, duration);
    const newY = easeInOutQuart(time, startY, distanceY, duration);
    if (time >= duration) {
      clearInterval(timer);
    }
    window.scroll(newX, newY);
  }, 1000 / 60); // 60 fps
};

// Accordion

const items = document.querySelectorAll(".accordion button");

function toggleAccordion() {
  const itemToggle = this.getAttribute('aria-expanded');
  
  for (i = 0; i < items.length; i++) {
    items[i].setAttribute('aria-expanded', 'false');
  }
  
  if (itemToggle == 'false') {
    this.setAttribute('aria-expanded', 'true');
  }
}

items.forEach(item => item.addEventListener('click', toggleAccordion));

$('.carousel').slick({
  dots: true,
  infinite: true,
  slidesToShow: 4,
  slidesToScroll: 4
});

// Formulários

/* Formulário do profissional */
$("#sendForm").prop("disabled", !$("#termosUso:checked").length)

$("#termosUso").click(function() {
  if($("#termosUso:checkbox:checked").length > 0) {
    $("#sendForm").prop('disabled', false);
  } else {
    $("#sendForm").prop('disabled', true);
  }
})


$(".accordion").hide();

$(document).ready(function(){
  $("#sendForm").click(function(){ 
      $.ajax({
        url: 'search.php', 
        type: 'POST', // Tentukan type nya POST atau GET
        data: {keyword: $("#picklist").val()}, // Set data yang akan dikirim
        dataType: "json",
        beforeSend: function(e) {
          if(e && e.overrideMimeType) {
            e.overrideMimeType("application/json;charset=UTF-8");
          }
        },
        success: function(response){ 
          $("#accordion").html(response.result).show();
        },
        error: function (xhr, ajaxOptions, thrownError) { 
          alert(xhr.responseText); 
        }

      })
    })
});

    /*function validar(){
        $("#form").submit(function(e){
          $("#picklist").key(function(e){
            var pesquisa = $(this).val();
            console.log('chegou aqui');
            e.preventDefault();
            if(pesquisa != ''){
              console.log('chegou aqui');
              var dados = {
                palavra : pesquisa
              }
              console.log(dados);
              $post('search.php',dados,function(){
                $('.accordion').show();
              });
              /*$post('search.php',dados,function(retorna){
                //$(".accordion").html(retorna).show();
                  var valor = '';	
                            for (var i = 0; i < retorna.length; i++) {
                    valor += '<div class="accordion-item">';
                    valor += '<button id="accordion-button" aria-expanded="false">';
                    valor += '<div class="accordion-header">';
                    valor += '<span class="accordion-title">' + retorna[i].name + '</span>';
                    valor += '    <span class="accordion-subtitle">'+retorna[i].phone +'</span>';
                    valor += '  </div>';
                    valor += '  <span class="icon" aria-hidden="true"> + </span>';
                    valor += '</button>';
                    valor += '<div class="accordion-content">';
                    valor += '  <p class="accordion-info">'+retorna[i].description+'</p>';
                    valor += '</div>';
                    valor += '</div>';
                            }	
                            $('.accordion').html(valor).show();
              });
            }
          })
        
        });*/
        