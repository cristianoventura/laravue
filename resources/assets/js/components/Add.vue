<template>
    <div class="container">
        <h1>Add new food</h1>

        <form @submit.prevent="addFood()">
            <div class="row">
                <div class="col-sm-6 form-group">
                    <label>Name:</label>
                    <input type="text" class="form-control" v-model="food.name" required />
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6 form-group">
                    <label>Origin:</label>
                    <input type="text" class="form-control" v-model="food.origin" required />
                </div>
            </div>

            <div class="row">
                <div class="col-sm-4 form-group">
                    <label>Servings:</label>
                    <input type="number" class="form-control" v-model="food.servings" required />
                </div>
            </div>

            <button type="submit" class="btn btn-success">OK</button>
        </form>

        <br>
        <div class="alert alert-info" v-if="message">{{ message }}</div>
    </div>
</template>

<script>
    import axios from 'axios';

    export default {
        data: function() {
            return {
                food: { },
                message: false
            }
        },
        methods: {
            addFood() {
                axios.post('/api/food', this.food)
                    .then((response) => {
                        this.message = response.data.content;
                    })
            }
        }
    }
</script>