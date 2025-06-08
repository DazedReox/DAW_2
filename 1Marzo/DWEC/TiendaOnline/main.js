const API = "https://api.escuelajs.co/api/v1";
const LIMIT = 8;
let offset = 0;
let loading = false;
let currentUser = null;
let cart = JSON.parse(localStorage.getItem("cart")) || {};

$(document).ready(() => {
  loadView('home');
  setupEvents();
});

function loadView(view, data) {
  $("#app").load(`views/${view}.html`, () => {
    if (view === 'home') initHome();
    if (view === 'product-detail') initProductDetail(data);
    if (view === 'cart') renderCart();
    if (view === 'login') initLogin();
    if (view === 'register') initRegister();
  });
}

function setupEvents() {
    $("#app, nav").on("click", "[data-view]", e => {
    e.preventDefault();
    const $el = $(e.currentTarget);
    const v = $el.data("view");
    const d = $el.data("id");
    loadView(v, d);
});

}

function initHome() {
  offset = 0;
  $("#product-list").empty();
  loadProducts();

  $(window).scroll(() => {
    if (!loading && window.innerHeight + window.scrollY >= document.body.offsetHeight - 100) {
      loadProducts();
    }
  });

  $("#cat-filter").change(loadProducts);
  $("#sort-order").change(() => {
    $("#product-list").empty();
    offset = 0;
    loadProducts();
  });
}

// cargar los proximos productos
function loadProducts() {
  loading = true;
  $("#preloader").show();
  const catId = $("#cat-filter").val();
  const sort = $("#sort-order").val();
  let url = `${API}/products?offset=${offset}&limit=${LIMIT}`;
  if (catId) url = `${API}/categories/${catId}/products?offset=${offset}&limit=${LIMIT}`;

  $.get(url).done(products => {
    if (sort) {
      products.sort((a,b) => sort==='asc'? a.price - b.price : b.price - a.price);
    }
    products.forEach(p => {
      $("#product-list").append(`
        <div class="product-card">
          <img src="${p.images[0]}" />
          <h4>${p.title}</h4>
          <p>${p.price} €</p>
          <button data-view="product-detail" data-id="${p.id}">Ver</button>
          <button data-add="${p.id}">Añadir</button>
        </div>`);
    });
    offset += LIMIT;
    loading = false;
    $("#preloader").toggle(products.length === LIMIT);
  });
}

// detalles de los productos
function initProductDetail(id) {
  $.get(`${API}/products/${id}`).done(p => {
    $("#detail-img").attr("src", p.images[0]);
    $("#detail-title").text(p.title);
    $("#detail-desc").text(p.description);
    $("#detail-price").text(p.price + " €");
    $("#buy-btn").off().click(() => {
      addToCart(p);
      loadView('cart');
    });
  });
}

// cart
function addToCart(p) {
  if (cart[p.id]) cart[p.id].qty++;
  else cart[p.id] = {item: p, qty:1};
  saveCart();
}

function saveCart() {
  localStorage.setItem("cart", JSON.stringify(cart));
}

function renderCart() {
  let html = '';
  Object.values(cart).forEach(c => {
    html += `<div>
      <img src="${c.item.images[0]}" /><h5>${c.item.title}</h5>
      <input type="number" min="0" value="${c.qty}" data-id="${c.item.id}" class="qty" />
      <span>${c.item.price * c.qty} €</span>
    </div>`;
  });
  $("#cart-list").html(html);
  $("#cart-total").text(Object.values(cart)
    .reduce((sum,c)=>sum + c.item.price*c.qty, 0) + ' €');

  $(".qty").change(function(){
    const id = $(this).data("id"), val = +$(this).val();
    if(val<=0) delete cart[id];
    else cart[id].qty=val;
    saveCart();
    renderCart();
  });

  $("#checkout-btn").off().click(() => {
    if (currentUser) {
      emailjs.send("serviceID","templateOrder", {
        to_email: currentUser.email,
        order: JSON.stringify(cart)
      });
      cart={}; saveCart();
      alert("Pedido realizado ¡revise su email!");
      loadView('home');
    } else alert("Debe loguearse");
  });
}

// login y registro
function initLogin(){
  $("#login-btn").click(() => {
    const e=$("#email").val(), p=$("#pass").val();
    $.post(`${API}/auth/login`,{email:e,password:p})
    .done(res=>{
      localStorage.setItem("token", res.access_token);
      $.get(`${API}/auth/profile`,{},{ headers: {"Authorization":"Bearer "+res.access_token} })
      .done(profile => {
        currentUser=profile;
        alert("Login ok");
        loadView('home');
        initHome();
      });
    }).fail(()=>alert("Credenciales incorrectas"));
  });
}

function initRegister(){
  $("#reg-btn").click(() => {
    const name=$("#name").val(), e=$("#email").val(), p=$("#pass").val();
    $.post(`${API}/users/`,{name, email:e, password:p, avatar:""})
    .done(u=>{
      emailjs.send("serviceID","templateReg",{to_email:u.email});
      alert("Usuario registrado (no se loguea automáticamente)");
      loadView('login');
    }).fail(()=>alert("Email ya usado"));
  });
}
