<template>
    <div>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" @click="addNew">
            Add New Theme
        </button>
<!---->
<!--        <button @click="addNew">TEST</button>-->
<!---->
        <!-- Modal -->
        <!-- New Theme Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Create New Theme</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form v-on:submit.prevent="submitForm">
<!--                            @csrf-->
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" v-model="form.name"/>
                                <div v-if="this.requestError.name">
                                    <span class="text-danger">{{this.requestError.name.toString()}}</span>
                                </div>
<!--                                @error('name')-->
<!--                                <span class="text-danger">{{$message}}</span>-->
<!--                                @enderror-->
                            </div>
                            <div class="form-group">
                                <label for="body">Description</label>
                                <textarea class="form-control h-25" rows="10"  placeholder="Theme Description" id="body" name="body" v-model="form.body"></textarea>
<!--                                @error('body')-->
<!--                                <span class="text-danger">{{$message}}</span>-->
<!--                                @enderror-->
                                <div v-if="this.requestError.body">
                                    <span class="text-danger">{{this.requestError.body.toString()}}</span>
                                </div>
                                <div class="invalid-feedback">
                                    Please enter a message in the textarea.
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Ok</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            requestError: '',
            form: {
                name: '',
                body: ''
            }
        }
    },
    methods: {
        addNew() {
            // this.form.reset();
            $('#myModal').modal('show');
            // let myModal = new bootstrap.Modal(document.getElementById('myModal'), {
            //     keyboard: false
            // })
            // // debugger
            // myModal.show()
        },
        submitForm(){
            this.requestError = '';
            // alert('erwrwerwe');

            // axios.post('/', this.form)
            // axios.post('/', {body: 'test', name: 'test'})
            axios.post('/', this.form)
                // ,  {
            //     headers: {
            //         'Content-Type': 'multipart/form-data'
            //     }})
                .then((res) => {
                    // console.log(res.data);
                    //Perform Success Action
                    // console.log('RESULT ',res);
                    // alert(res);
                    // $('#myModal').modal('hide');
                    // console.log(res.data)
                    // alert(res.data);
                    // console.log('test');
                    let data = res.data.newTheme;
                    this.form.name = '';
                    this.form.body = '';
                    const newTheme  = {
                        id: data.id,
                        name: data.name,
                        body: data.body
                    }
                    console.log(res.data.newTheme);
                    this.$emit('newTheme', res.data.newTheme);
                })
                .catch((error) => {
                    // error.response.status Check status code
                    // alert(error);
                    // console.log(error);
                    // alert(error.data);
                    //     switch (error.response.status) {
                    //         case 400:
                    //             console.log('400 error');  // not getting here
                    //             break;
                    //         case 401:
                    //             console.log('401 error');  // or here
                    //             break;
                    //         default:
                    //             console.log('some other error');  // end up here all the time
                    //             break;
                    //             console.log('SignInForm.authenticate error: ', error);
                    //     }
                    // console.log(error);

                    let text = "";
                    if (error.response.status === 422) {
                        // console.log('ERROR DATA');
                        // Swal.fire('error', text, 'error');
                        // console.log(error.response.data.errors.na);
                        this.requestError = error.response.data.errors;
                        // console.log(error.response.data.errors.body);
                        // console.log(this.requestError);
                    }
                    this.loading = false;
                }).finally(() => {
                //Perform action in always
                if (this.requestError.length === 0)
                    $('#myModal').modal('hide');
            });
        }
    }
}

</script>
