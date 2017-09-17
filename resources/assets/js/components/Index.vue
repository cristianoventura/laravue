<template>
    <div class="container">
        <h1>All foods <a href="/#/add" class="btn btn-primary">Add new</a></h1>

        <table class="table">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Origin</th>
                <th>Servings</th>
                <th>Actions</th>
            </tr>

            <tr v-for="(food, index) in foods">
                <td>{{ food.id }}</td>
                <td>{{ food.name }}</td>
                <td>{{ food.origin }}</td>
                <td>{{ food.servigs }}</td>
                <td>
                    <a :href="'/#/edit/' + food.id" class="btn btn-info">Edit</a>
                    <a href="#" @click="deleteFood(food.id, index)" class="btn btn-danger">Delete</a>
                </td>
            </tr>

        </table>
    </div>
</template>

<script>
    import axios from 'axios';

    export default {
        data: () => {
            return {
                foods: { }
            }
        },
        created() {
            axios.get('/api/food')
                .then((response) => {
                    this.foods = response.data;
                })
        },
        methods: {

            deleteFood(id, index) {
                console.log(id, index);
                var res = confirm('Are you sure?');

                if (res) {
                    axios.delete('/api/food/' + id)
                        .then((response) => {
                            this.foods.splice(index, 1)
                        })
                }
            }
        }
    }
</script>