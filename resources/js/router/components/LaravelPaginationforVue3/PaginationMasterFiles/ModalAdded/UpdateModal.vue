<template>
    <div class="rootinMyModalAdd">
        <!-- Modal -->
        <div class="modal fade" id="UpdateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" @click='ClearAddData'></button>
                    </div>
                    <div class="modal-body">
                        <label for="nameYes">Your Name, Email & Shark Level Here</label>
                        <textarea class="form-control" placeholder="Enter Name Here" id="nameYes" v-model="rec.name"></textarea>
                        <textarea class="form-control" placeholder="Enter Email Here" id="email" v-model="rec.email"></textarea>
                        <textarea class="form-control" placeholder="Enter shark_level Here" id="shark_level" v-model="rec.shark_level"></textarea>
                        <textarea class="form-control" placeholder="Enter published Here" id="published" v-model="rec.published"></textarea>
                        <p class="alert alert-success" v-if="success.length > 0">{{ success }}</p>
                        <ul v-if="errors.name" class="list-unstyle">
                            <li v-for="error in errors.name" :key="error.name" class="alert alert-danger" role="alert">{{ error }}</li>
                        </ul>
                        <ul v-if="errors.email" class="list-unstyle">
                            <li v-for="error in errors.email" :key="error.email" class="alert alert-danger">{{ error }}</li>
                        </ul>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" @click='ClearAddData'>Close</button>
                        <button type="button" class="btn btn-primary" @click='UpdateRecord'>Update Record</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import axios from "axios";
export default {
    name: 'UpdateModal',
    props: ['rec'],
    data() {
        return {
            success: '',
            errors: []
        }
    },
    methods: {
        UpdateRecord(id) {
            axios.put('http://127.0.0.1:8000/api/sharks/' + this.rec.id, {
                    //   axios.put('http://127.0.0.1:8000/api/sharks/1',{
                    "name": this.rec.name,
                    "email": this.rec.email,
                    "shark_level": this.rec.shark_level,
                    "published": this.rec.published,
                    // "_methos":'PUT',
                })
                .then(data => {
                    this.$emit('UpdateRecordEmit', data);
                    this.success = "Data has been updated successfully";
                })
                .catch(error => {
                    this.errors = error.response.data.errors;
                    console.log(this.errors);
                })
        },

        ClearAddData() {
            this.success = '';
            this.errors = [];
        },
    },


}

</script>
<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
h3 {
    margin: 40px 0 0;
}

ul {
    list-style-type: none;
    padding: 0;
}

li {
    display: inline-block;
    margin: 0 10px;
}

a {
    color: #42b983;
}

</style>
