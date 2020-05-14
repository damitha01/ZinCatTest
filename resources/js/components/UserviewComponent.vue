<template>
    <div class="">
        <div class="row justify-content-center">

            <div class="col-md-12">
                <div classuserView="row" id="user-view-block">
                    {{userView}}sadasd
                </div>
            </div>
                
                    
                
        </div>

    </div>
</template>

<script>
 
    export default {
        /*
        Defines the data used by the component
        */
        mounted() {
            alert("ss");
            // this.getuserData()
        },
        data(){
            return {
                userView: "User View Data",
                
            }
        },
        computed:{
           
        },
        methods: {
            // Get all uploaded csv list
            getuserData: function() {
                axios.post('/getCSVListForMapping').then(function(response){
                   
                    var responseData = response.data;
                    // console.log("getCSVListForMapping");
                    // console.log(responseData);

                }.bind(this));
               
            }

        },
        ready() {
          
        }

    }

</script>





