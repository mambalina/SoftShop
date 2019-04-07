function init() {
	$.getJSON("goods.json", goodsOut);
}

function goodsOut(data){
	console.log(data);
	var out ='';
	var i = 0;
	for (var key in data){
		out='';
		if (i == 0){
			out+='<div class="col-md-4 col-lg-4 col-xl-4 mx-auto mt-3">';
			out+='<div class="card">';
			out +='<img src="img/'+data[key].picture+'" class="card-img-top" alt="...">';
			out +='<div class="card-body">';
			out +='<p class="card-text">'+data[key].name+'</p>';
			out +='<p class="card-text money">'+data[key].price+' грн.</p>';
			out +='<div class="buttons">';
			out +='<input type="button" class="btn sbtn" value="Подробнее" data-price="'+data[key].price+'" data-product="'+data[key].name+'" data-id="'+key+'">';
			out +='<div class="input-image">';
			out +='<input type="image" src="img/heart.png" alt=""></div></div></div>';
			out+= '</div></div>  <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3 "></div>';
			$('.cards').html(out);
		}
		if (i == 1){
			out+='<div class="col-md-4 col-lg-4 col-xl-4 mx-auto mt-3">';
			out+='<div class="card">';
			out +='<img src="img/'+data[key].picture+'" class="card-img-top" alt="...">';
			out +='<div class="card-body">';
			out +='<p class="card-text">'+data[key].name+'</p>';
			out +='<p class="card-text money">'+data[key].price+' грн.</p>';
			out +='<div class="buttons">';
			out +='<input type="button" class="btn sbtn" value="Подробнее" data-price="'+data[key].price+'" data-product="'+data[key].name+'" data-id="'+key+'">';
			out +='<div class="input-image">';
			out +='<input type="image" src="img/heart.png" alt=""></div></div></div>';
			out+= '</div></div>';
			$('.cards').html(out);
		}
		if (i == 2){
			out+='<div class="alone-card">';
			out+='<div class="col-md-4 col-lg-4 col-xl-4 mx-auto mt-3">';
			out+='<div class="card">';
			out +='<img src="img/'+data[key].picture+'" class="card-img-top" alt="...">';
			out +='<div class="card-body">';
			out +='<p class="card-text">'+data[key].name+'</p>';
			out +='<p class="card-text money">'+data[key].price+' грн.</p>';
			out +='<div class="buttons">';
			out +='<input type="button" class="btn sbtn" value="Подробнее" data-price="'+data[key].price+'" data-product="'+data[key].name+'" data-id="'+key+'">';
			out +='<div class="input-image">';
			out +='<input type="image" src="img/heart.png" alt=""></div></div></div>';
			out+= '</div></div></div>';
			$('.gridDiv').html(out);
		}
		 if(i == 3){
			 out+='<div class="col-md-4 col-lg-4 col-xl-4 mx-auto mt-3">';
			out+='<div class="card" style="top: 115px;">';
			out +='<img src="img/'+data[key].picture+'" class="card-img-top" alt="...">';
			out +='<div class="card-body">';
			out +='<p class="card-text">'+data[key].name+'</p>';
			out +='<p class="card-text money">'+data[key].price+' грн.</p>';
			out +='<div class="buttons">';
			out +='<input type="button" class="btn sbtn" value="Подробнее" data-price="'+data[key].price+'" data-product="'+data[key].name+'" data-id="'+key+'">';
			out +='<div class="input-image">';
			out +='<input type="image" src="img/heart.png" alt=""></div></div></div>';
			out+= '</div></div>  <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3 "></div>';
			$('.gridDiv').html(out);
		 }
		 if (i == 4){
			 out+='<div class="col-md-4 col-lg-4 col-xl-4 mx-auto mt-3">';
			out+='<div class="card">';
			out +='<img src="img/'+data[key].picture+'" class="card-img-top" alt="...">';
			out +='<div class="card-body">';
			out +='<p class="card-text">'+data[key].name+'</p>';
			out +='<p class="card-text money">'+data[key].price+' грн.</p>';
			out +='<div class="buttons">';
			out +='<input type="button" class="btn sbtn" value="Подробнее" data-price="'+data[key].price+'" data-product="'+data[key].name+'" data-id="'+key+'">';
			out +='<div class="input-image">';
			out +='<input type="image" src="img/heart.png" alt=""></div></div></div>';
			out+= '</div></div>';
			$('.gridDiv').html(out);
		 }
		 /* 
		 jQuery(document.getElementsByClassName("card")[i]).html(out);
		i++;
		out= ''
		
		out +=`<img src="img/${data[key].picture}" class="card-img-top" alt="...">`;
        out +='<div class="card-body">';
        out +=`<p class="card-text">${data[key].name}/p>`;
		out +=`<p class="card-text money">${data[key].price} грн.</p>`;
        out +='<div class="buttons">';
        out +=`<input type="button" class="btn sbtn" value="Подробнее" data-price="${data[key].price}" data-product="${data[key].name}">`;
        out +='<div class="input-image">';
        out +='<input type="image" src="img/heart.png" alt=""></div></div></div>';
		*/
		
		i++;
	}
	
	$('.sbtn').on('click', addToCard);
	
}

function addToCard(){
	var id = $(this).attr('data-id');
	console.log(id);
}

$(document).ready(function(){
	init();
});