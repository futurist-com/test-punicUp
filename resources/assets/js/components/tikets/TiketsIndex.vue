<template>
    <div>
        <div class="form-group">
            <router-link :to="{name: 'createTiket'}" class="btn btn-success">Создать новое Задание</router-link>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">Список созданных заданий</div>
            <div class="panel-body">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Дата</th>
                        <th>Наименование</th>
                        <th>Статус</th>
                        <th width="100">&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="tiket, index in tikets">
                        <td>{{ tiket.created_at }}</td>
                        <td>{{ tiket.name }}</td>
                        <td>{{ status[tiket.status] }}</td>
                        <td>
                            <div v-if="tiket.status === 1">
                                <router-link :to="{name: 'editTiket', params: {id: tiket.id}}"
                                             class="btn btn-xs btn-secondar">
                                    Редактировать
                                </router-link>
                                <a href="#"
                                   class="btn btn-xs btn-primary"
                                   v-on:click="updateStatus(tiket.id, {status: 2})">
                                    Взять  в работу
                                </a>
                            </div>
                            <div v-if="tiket.status === 2">
                                <a href="#"
                                   class="btn btn-xs btn-success"
                                   v-on:click="updateStatus(tiket.id, {status: 3})">
                                    Закрыть
                                </a>
                            </div>
                            <div v-if="tiket.status === 3">
                                <a href="#"
                                   class="btn btn-xs btn-danger"
                                   v-on:click="deleteEntry(tiket.id)">
                                    Удалить
                                </a>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                tikets: [],
                status:['', "Новый", "В работе", "Завершенный"]
            }
        },
        mounted() {
            this.getTiket();
        },
        methods: {
            deleteEntry(id, index) {
                if (confirm("Вы действительно хотите удалить задание?")) {
                    var app = this;
                    axios.delete('/api/tiket/' + id)
                        .then((resp)=> {
                            this.getTiket();
                        })
                        .catch(function (resp) {
                            alert("Не удалось удалить компанию");
                        });
                }
            },
            getTiket(){
                axios.get("/api/tiket")
                    .then((resp)=> {
                        this.tikets = resp.data;
                    })
                    .catch(function(resp) {});
            },
            updateStatus(id, status) {
                if (confirm("Вы действительно хотите взять в работу задание?")) {
                    var app = this;
                    var newTiket = status
                    axios.put('/api/tiket/updatestatus/' + id, status)
                        .then((resp)=> {
                            this.getTiket();
                        })
                        .catch(function (resp) {
                            //console.log(resp);
                            alert("Не удалось обновить задание");
                        });
                }
            },
        }
    }
</script>
