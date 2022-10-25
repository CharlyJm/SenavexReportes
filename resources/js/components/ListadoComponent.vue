<template>
    <div class="table-responsive">
             <table class="table table-hover table-bordered" id="sampleTable">
                   <thead>
                   <tr>
                   <th>Id</th>
                   <th>nombre</th>
                   <th>email</th>
                   <th>password</th>
                   </tr>
                   </thead>
               <!-- <tbody>
                   <tr v-for="user in users ">
                      <td>{{pais.id}}</td>
                     <td>{{pais.email}}</td>
                     <td>{{pais.password}}</td>
                   </tr>
                   <button  class="btn btn-success btn-sm" type="button"></button>
               </tbody> -->
            </table>
       </div>
   </template>

<!-- <script>
import axios from 'axios';
import Home from "@/views/Home.vue";
import datatable from 'datatables.net-bs4'
import { then } from 'laravel-mix';
export default{
    mounted(){
    this.getUser()
    },
    methods:{
        // tabla(){
        //     this.$nextTick(()=>{
        //         $('#sampleTable').DataTable();
        //     });
        // },
        getUser(){
            axios.get('listar_users').then(res=>{
                // $('#sampleTable').DataTable({
                //     data:res.data,
                //     columns:[
                //         {data:'id_pais'},
                //         {data:'pais'},
                //         {data:'codigo_pais'}
                //     ]
                // });
               this.users=res;
               console.log(res);
        });
    }

 }
}
</script> -->
