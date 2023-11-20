const button = document.getElementById('button_load')
const select = document.getElementById('select')
const affichageChargerPlus = document.querySelector('.charger-plus')

button.addEventListener('click', () => {
const type = document.querySelector('#type')
const category = document.querySelector('#category')
    fetch(`http://localhost:8000/annonceSearch?page=${button.value}&category=${category.value}&type=${type.value}`)
        .then(response => response.json())
        .then(data => {
            const currentCard = document.getElementById('newCard')
            if (data.search) {
                data.search.forEach(dat => {
                    currentCard.innerHTML += ` <div class="card_annonce uk-width-1-3 ">
                <div class="card-header_annonce">
                    <div class="card-header-hover_annonce">
                        <img src="${dat.image}" alt="${dat.image_name}" class="card-image_annonce">
                            <a href="/annonces/detail-annonce?id=${dat.id}" class="uk-button card-button_annonce">Voir l'annonce</a>
                    </div>
                </div>
                <div class="card-body_annonce">
                    <h5 class="card-title_annonce"> ${dat.title}</h5>
                    <p class="card-description_annonce">
                        ${dat.description}</p>
                </div>
                <div class="card-footer_annonce">
                    <div class="card-info_annonce">
                        <p class="card-category_annonce">${dat.name} <p hidden="hidden">${dat.nametype}</p>
                        </p>
                        <p class="card-user_annonce">
                            ${dat.username}</p>
                        <p class="card-date-place_annonce"></p>
                            ${dat.published_date}
                            -
                            ${dat.localisation}
                        </p>
                    </div>
                </div>
            </div>
        </div> `

                }) 
                
                if (data.count[0].countads <= (button.value)*2) {                    
                    affichageChargerPlus.style.display = "none"   
                }
            }

        })
        .catch(error => alert("Erreur : " + error));

    button.setAttribute('value', parseInt(button.value) + 1)

});


/* select.addEventListener('onchange')
$categorie

page.setAttribute('data-category', parseInt(select.value)) */