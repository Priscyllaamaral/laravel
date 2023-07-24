<template>
  <div class="container">
    <h3>Teste</h3>
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" aria-current="page" href="#vendas" >Vendas</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#cheques" >Cheques</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#spc" >SPC</a>
        </li>
    </ul>

    <div class="tab-content">
        <div class="tab-pane container active" style="padding: 12px 0" id="vendas">
            <div class="row">
                <div class="col-12">
                    VENDAS
                </div>
            </div>
            
        </div>
        <div class="tab-pane container" style="padding: 12px 0" id="cheques">
            <div class="row">
                <div class="col-12">
                    CHEQUES
                </div>
            </div>
            
        </div>
        <div class="tab-pane container" style="padding: 12px 0" id="spc">
            <div class="row">
                <div class="col-12">
                    SPC
                </div>
            </div>
            
        </div>
    </div>
  </div>
</template>

<script>
export default {
    mounted() {
       console.log($('.nav-tabs').html()) 
    }
}
</script>

<style>

</style>