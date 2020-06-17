<template>
    <div>
        <button v-if="showdownload" v-on:click="download">Download pdf</button>

        <div class="l-menu m-paper" id="menu">
            <div v-for="(menutypes, key, index) in mutableMenuitems">
                <h3 class="l-menu__group__type">
                {{mutableMenuitems[key][0].menuitem_type.type}}
                </h3>
                <ul class="l-menu__group">
                    <li class="l-menu__group__item" v-for="menuitem in menutypes">
                        <span class="l-menu__group__item__name">
                            <i v-on:click="favorite(menuitem.id)" v-bind:class="[menuitem.favorite ? 'fas fa-star favorite' : 'far fa-star']"></i> 
                            {{ menuitem.menunumber }}. {{menuitem.name}}</span> <span class="l-menu__group__item__price">&euro; {{menuitem.price}}
                        </span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['menuitems', 'showdownload'],
        methods: {
            download() {
                let menu = document.querySelector('#menu');
                let w = window.open("/menuonly", "Menu")
                w.print()
                w.close()
            },
            generateMenuObject(menuitems) {
                let menuObject = {}
                const favorites = JSON.parse(localStorage.getItem('favorites')) || []

                menuitems.forEach(item => {
                    const index = favorites.findIndex(t => t === item.id)
                    item.favorite = index >= 0

                    if(typeof menuObject[item['menuitem_type_id']] === 'undefined') {
                        menuObject[item['menuitem_type_id']] = [item]
                    } else {
                        menuObject[item['menuitem_type_id']].push(item)
                    }
                });
                return menuObject
            },
            favorite(id) {
                let favorites = JSON.parse(localStorage.getItem('favorites')) || []

                const index = favorites.findIndex(t => t === id)

                if(index >= 0) {
                    favorites.splice(index, 1)
                } else {
                    favorites.push(id)
                }
                

                localStorage.setItem('favorites', JSON.stringify(favorites))
                this.mutableMenuitems = this.generateMenuObject(JSON.parse(this.menuitems))
            }
        },
        data() {
            return {
                mutableMenuitems: this.generateMenuObject(JSON.parse(this.menuitems))
            }
        }
    }
</script>
