<template>

    <div class="container">
        
        <div aria-live="polite" aria-atomic="true" style="">
            <div id="main-toaster">
                
                <div v-bind:class="{ succmsg: succmsg }">
                    <!-- <div class="alert alert-success">Data inserted successfully</div> -->
                
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
                            Data inserted successfully
                        </div>
                    </div>

                </div>

            </div>
        </div>

        <div class="modal fade" id="addNewWebsite" tabindex="-1" role="dialog" aria-labelledby="addNewWebsiteTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title" id="addNewWebsite">Add New (Website)</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form method = "post" name="addpost" id="addpost" action="#" enctype="multipart/form-data" @submit.prevent="addPost">
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="text" name="site_name" id="site_name" class="form-control" placeholder="Website name" v-model="post.site_name"/>
                                {{ post.site_name }}
                            </div>
                            <div class="form-group">
                                <input type="url" aria-required="true" name="site_url" id="site_url" class="form-control" placeholder="Website URL" v-model="post.site_url" pattern="^(https?://)?([a-zA-Z0-9]([a-zA-ZäöüÄÖÜ0-9\-]{0,61}[a-zA-Z0-9])?\.)+[a-zA-Z]{2,6}$"/>
                            </div>
                            <div class="form-group">
                                <select class="form-control" name="check_type" id="check_type" v-model="post.check_type">
                                    <option selected>Check type</option>
                                    <option value="website">Website</option>
                                </select>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button class="btn btn-success">Add</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>

    </div>
</template>

<script>
    
    export default {
        
        data() {
            return {
                post: {
                    'site_name': '',
                    'site_url': '',
                    'check_type': ''
                },
                succmsg:  true,
            }
        },
        methods: {
            addPost() {
                this.$http.post('/api/websites',{
                        'site_name': this.post.site_name,
                        'site_url': this.post.site_url,
                        'check_type': this.post.check_type
                    }).
                    then((data) => {
                        this.succmsg = false;
                        console.log(data);
                        this.post.site_name = '';
                        this.post.site_url = '';
                        this.post.check_type = '';
                        var self = this;
                        setTimeout(function(){
                            self.succmsg = true;
                        },3000);
                    });
            }
            
        },
        computed: {
}
    }
</script>
<style scoped>
    .succmsg {
        display: none;
    }
</style>