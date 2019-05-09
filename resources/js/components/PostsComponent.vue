<template>

    <div id="postsrec">
        
        <div class="row justify-content-center">

            <!-- <div v-bind:class="{ succmsg: succmsg }">
                <div class="col-md-12 col-lg-12">
                    <div class="alert alert-success cusmsg">{{ actionmsg }}</div>
                </div>
            </div> -->

        <div aria-live="polite" aria-atomic="true" style="">
            <div id="main-toaster">
                
                <div v-bind:class="{ succmsg: succmsg }">
                
                    <div class="toast alert alert-success" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="toast-header">
                            <div class="awesome-icon"></div>
                            <strong class="mr-auto pr-3">Just to let you know...</strong>
                            <small class="text-muted">a few seconds ago</small>
                            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="toast-body">
                            {{ actionmsg }}
                        </div>
                    </div>

                </div>

            </div>
        </div>

            <div class="col-md-12">
                <!-- Button trigger modal -->
                
                <!-- Edit Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" v-bind:class="{ showmodal:showmodal }">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body">
                                <form method = "post" name="addpost" id="addpost" action="#" @submit.prevent="updatePost">
                                    <div class="form-group">
                                        <input type="text" name="site_name" id="site_name" class="form-control" placeholder="Website name" v-model="post.site_name" />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="site_url" id="site_url" class="form-control" placeholder="URL name" v-model="post.site_url"/>
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control" name="check_type" id="check_type" v-model="post.check_type">
                                            <option selected hidden>Check type</option>
                                            <option value="website">Website</option>
                                        </select>
                                    </div>
                                    <div class="form-group text-right">
                                        <button class="btn btn-success">Submit</button>
                                    </div>
                                </form>
                            </div>
                            
                        </div>
                    </div>
                </div>

                <!-- Delete Modal -->
                <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModal2Label" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <p>Are you sure want to delete the record? </p>
                                </div>
                                <div class="form-group text-center">
                                    <button class="btn btn-success" v-on:click="hideModal()">Cancel</button>
                                </div>
                                <div class="form-group text-center">
                                    <button class="btn btn-success" v-on:click="deletePost()">Ok</button>
                                </div>
                            </div>
                        
                        </div>
                    </div>
                </div>

                <!-- Preview Table -->
                <table class="table table-striped" v-bind:pagenumber = "pagenumber">
                    <thead>
                        <tr>
                            <th scope="col">Site Name</th>
                            <th scope="col">URL</th>
                            <th scope="col">Status</th>
                            <th scope="col" colspan="2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="post in laravelData.data" :key="post.id">
                            <td scope="row">{{ post.site_name }}</td>
                            <!-- <td>{{ post.site_url.slice(0,50) + "....." }}</td> -->
                            <td><a :href="post.site_url" target="_blunk">{{ post.site_url }}</a></td>
                            <td>
                                <!-- {{post.success}} -->
                                
                                <div v-if="post.status === 0" class="btn btn-danger">
                                    Down
                                </div>
                                <div v-else-if="post.status === 200" class="btn btn-success">
                                    Up
                                </div>
                                <div v-else class="btn btn-warning">
                                    Unknown
                                </div>
                                
                            </td>
                            <td><a href="#" v-on:click="editPost(post.id)" data-target="#exampleModal"  data-toggle="modal" v-bind:site_url="post.site_url">Edit</a></td>
                            <td><a href="#" data-target="#exampleModal2" v-on:click="deleteId(post.id)"  data-toggle="modal" v-bind:id="id"  >Delete</a></td>
                        </tr>
                    </tbody>
                </table>
                <!-- <pagination :data="laravelData" :limit="2" @pagination-change-page="postLists">
                        <span slot="prev-nav">&lt; Previous</span>
                        <span slot="next-nav">Next &gt;</span>
                </pagination> -->

            </div>

        </div>

    </div>

</template>

<script>
    
    export default {
        
        data() {
            
            return {
                post: {
                    "uri": '',
                    "site_name": '',
                    "site_url": '',
                    "check_type": '',
                },
                laravelData: {},
                id: '',
                succmsg:  true,
                showmodal: false,
                pagenumber: 1,
                actionmsg: '',
                
            } 
        },
        methods: {
            postLists(page) {
                if (typeof page === 'undefined') {
                    page = 1;
                }
                this.$http.get('/api/websites?page='+ page).then((response) => {
                    this.posts = response.data.data;
                    this.laravelData = response.data;
                    this.pagenumber = page;

                    //console.log(this.laravelData.data);

                    
});
            },
editPost(postid) {
                this.$http.get('/api/websites/'+ postid).
                    then((data) => {
                        this.post.site_name = data.data.data.site_name;
                        this.post.site_url = data.data.data.site_url;
                        this.post.check_type = data.data.data.check_type;
                        this.id = postid;
                    });
            },
            updatePost() {
                   this.$http.put('/api/websites/'+this.id,{
                        'uri': this.post.site_url,
                        'site_name': this.post.site_name,
                        'site_url': this.post.site_url,
                        'check_type': this.post.check_type
                    }).
                    then((data) => {
                        this.succmsg = false;
                        //console.log(data);
                        this.post.site_name = '';
                        this.post.site_url = '';
                        this.post.check_type = '';
                        var self = this;
                        setTimeout(function(){
                            self.succmsg = true;
                        },3000);
                        this.actionmsg = "Data updated successfully";
                        $('#exampleModal').modal('hide');
                        
                this.postLists(this.pagenumber);
                        
                    });
            },
            deleteId(postid) {
                    this.id = postid;
            },
            deletePost() {
                   this.$http.delete('/api/websites/'+this.id).
                    then((data) => {
                        this.succmsg = false;;
                        var self = this;
                        setTimeout(function(){
                            self.succmsg = true;
                        },3000);
                         
                         this.actionmsg = "Data deleted successfully";
this.postLists(this.pagenumber);
                        $('#exampleModal2').modal('hide');
                        
                    });
            },
            hideModal() {
                $('#exampleModal2').modal('hide');
            }
            
        },
        mounted() {
            this.postLists();
        }
    }
    
</script>
<style scoped>
    .succmsg {
        display: none;
    }
    .showmodal {
        display: none !important;
        opacity: 0;
    }
</style>