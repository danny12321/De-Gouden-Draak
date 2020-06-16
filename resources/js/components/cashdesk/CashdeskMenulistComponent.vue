<template>
    <div class="m-cashdesk__gridcontainer__menu">
        <div v-for="(menutypes, key, index) in mutableMenuitems" v-bind:key="index">
            <h3>
               {{mutableMenuitems[key][0].menuitem_type.type}}
            </h3>
            <ul>
                <li v-for="menuitem in menutypes" v-bind:key="menuitem.id" class="m-cashdesk__gridcontainer__menu__item">
                    <div class="m-cashdesk__gridcontainer__menu__item__number">{{menuitem.menunumber}}.</div>
                    <div class="m-cashdesk__gridcontainer__menu__item__name">{{menuitem.name}}</div>
                    <div class="m-cashdesk__gridcontainer__menu__item__price">€{{menuitem.price}}</div>
                    <button v-on:click="$emit('add-menuitem', menuitem)">Toevoegen</button>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['menuitems'],
        methods: {
            generateMenuObject(menuitems) {
                let menuObject = {}
                menuitems.forEach(item => {
                    if(typeof menuObject[item['menuitem_type_id']] === 'undefined') {
                        menuObject[item['menuitem_type_id']] = [item]
                    } else {
                        menuObject[item['menuitem_type_id']].push(item)
                    }
                });

                return menuObject
            }
        },
        data() {
            return {
                mutableMenuitems: this.generateMenuObject(JSON.parse(this.menuitems))
            }
        }
    }
</script>
