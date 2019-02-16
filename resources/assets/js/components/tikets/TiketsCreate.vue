<template>
    <div>
        <div class="form-group">
            <router-link to="/" class="btn btn-default">Вернуться</router-link>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">Создание нового задания</div>
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
                            <button class="btn btn-success">Создать</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                tiket: {
                    name: '',
                    text: '',
                    status: 1,
                    }
            }
        },
        methods: {
            saveForm() {
                event.preventDefault();
                var app = this;
                var newTiket = app.tiket;
                axios.post('/api/tiket', newTiket)
                    .then(function (resp) {
                        app.$router.push({path: '/'});
                    })
                    .catch(function (resp) {
                        console.log(resp);
                        alert("Не удалось создать задание");
                    });
            }
        }
    }
</script>
