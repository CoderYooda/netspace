class Store
{
    constructor()
    {
        this.state = {};

        const miniCartCountEl = document.getElementById('mini-cart-qty');

        if (miniCartCountEl) {

            this.state['miniCartCount'] = parseInt(miniCartCountEl.innerText.trim());

            let miniCartCount = this.state.miniCartCount;

            Object.defineProperty(this.state, 'miniCartCount', {

                set(newVal) {

                    const miniCartQtyEl = document.getElementById('mini-cart-qty');

                    miniCartQtyEl.innerText = newVal;

                    miniCartQtyEl.classList.add('bounce');

                    setTimeout(() => {

                        miniCartQtyEl.classList.remove('bounce');

                    }, 750);

                    miniCartCount = newVal;

                },

                get() {

                    return miniCartCount;
                }
            });
        }

        const favoriteCountEl = document.getElementById('favorite-qty');

        if (favoriteCountEl) {

            this.state['favoriteCount'] = parseInt(favoriteCountEl.innerText.trim());

            let favoriteCount = this.state.favoriteCount;

            Object.defineProperty(this.state, 'favoriteCount', {
                set(newVal) {

                    document.getElementById('favorite-qty').innerText = newVal;

                    favoriteCount = newVal;
                },

                get() {

                    return favoriteCount;
                }
            });
        }

    }

    setMiniCartCount(newVal)
    {
        this.state.miniCartCount = newVal;
    }

    incrementMiniCartCount(val = 1)
    {
        this.state.miniCartCount += val;
    }

    setFavoriteCount(newVal)
    {
        this.state.favoriteCount = newVal;
    }

    incrementFavoriteCount(val = 1)
    {
        this.state.favoriteCount += val;
    }
}

let store = new Store();

export default store;