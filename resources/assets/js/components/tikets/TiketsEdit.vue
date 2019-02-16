<template>
    <div>
        <div class="form-group">
            <router-link to="/" class="btn btn-default">Вернуться</router-link>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">Редактирование задания</div>
            <div class="panel-body">
                <form v-on:submit="saveForm()">
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Название задания</label>
                            <input type="text" v-model="tiket.name" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Текст</label>
                            <textarea  v-model="tiket.text" class="form-control" rows="4" cols="50"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <button class="btn btn-success">Сохранить</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        mounted() {
            let app = this;
            let id = app.$route.params.id;
            app.tiketId = id;
            axios.get('/api/tiket/' + id)
                .then(function (resp) {
                    app.tiket = resp.data;
                })
                .catch(function () {
                    alert("Не удалось загрузить задание")
                });
        },
        data: function () {
            return {
                tiketId: null,
                tiket: {
                    name: '',
                    text: '',

                }
            }
        },
        methods: {
            saveForm() {
                event.preventDefault();
                var app = this;
                var newTiket = app.tiket;
                axios.patch('/api/tiket/' + app.tiketId, newTiket)
                    .then(function (resp) {
                        app.$router.replace('/');
                    })
                    .catch(function (resp) {
                        console.log(resp);
                        alert("Не удалось обновить задание");
                    });
            }
        }
    }
</script>


