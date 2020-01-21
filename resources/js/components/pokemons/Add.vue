
<template>
    <div class="modal fade" id="addPokemon" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar Pokemon</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form @submit.prevent="savePokemon">
                    <div class="form-group">
                        <label>Pokemon</label>
                        <input type="text" class="form-control" placeholder="Ingresa el nombre del pokemon"
                        v-model="name">
                    </div>
                    <div class="form-group">
                        <label>Picture</label>
                        <input type="text" class="form-control" placeholder="Ingresa la url de una imagen" 
                        v-model="picture">
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
            </div>
        </div>
    </div>
</template>

<script>
    import EventBus from '../../event-bus'
    export default{
        data(){
            return{
                name: null,
                picture: null,
            }
        },
        methods: {
            savePokemon: function(){
                let currentRoute = window.location.pathname
                console.log(currentRoute)
                // axios.post('http://laradex-laravel.test/pokemons',{
                    axios.post(`http://laradex-laravel.test${currentRoute}/pokemons`,{
                    name: this.name,
                    picture: this.picture
                })
                .then(function(rpse){
                    console.log(rpse)
                    $('#addPokemon').modal('hide')
                    // $('body').removeClass('modal-open');
                    // $('.modal-backdrop').remove();
                    EventBus.$emit('pokemon-added', rpse.data.pokemon) //emitimos un evento con nombre del evento e info
                    // console.log(rpse.data.pokemon)
                })
                .catch(function(err){
                    console.log(err)
                })
            }
        }
    }
</script>

<style>
    .top-space{
        margin-top: 20px;
    }
</style>