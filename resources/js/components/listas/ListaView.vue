<template>
    <div class="col-md-12 mb-2 px-2">
      <div class="card card-lista">
        <div class="card-body py-0 px-2">
          <div class="row">
            <div class="px-1 d-flex flex-inline justify-content-center align-items-center" :class="[ corSelecionada, grid1, grid1XL ]">
              <!-- <slot name="ids"> -->
                <div class="row">
                  <div class="col-12 text-center">
                    <slot name="id-codigo">
                      
                    </slot>
                  </div>
  
                  <div class="col-12 text-center">
                    <slot name="imagens">
                      
                    </slot>
                  </div>
  
                  <div class="col-12 px-2 text-center">
                    <div class="row">
                      <div class="col px-3">
                        <slot name="divisor">
                          
                        </slot>
                      </div>
                    </div>
                  </div>
  
                  <div class="col-12 text-center">
                    <slot name="ativo-status">
                      
                    </slot>
                  </div>
                  <div class="col-12 px-1 mt-1 mb-1 text-center">
                    <slot name="datas">
                      
                    </slot>
                  </div>
                </div>
              <!-- </slot> -->
            </div>
  
            <div class="col-12 ps-1 pe-1 d-flex align-items-start" :class="[ gridDescricoes ]">
              <div class="text-center me-2 mb-1 align-self-center" style="min-width: 107px; max-width: 107px;" v-if="!$slots.imagens && $slots.imagens2">
                <slot name="imagens2">
                  
                </slot>
              </div>
  
              <div>
                <slot name="descricoes">
                  
                </slot>
              </div>
            </div>
  
            <div class="col-12 px-1 d-flex flex-column justify-content-center align-items-center" :class="[ gridBadges ]">
              <slot name="badges">
                
              </slot>
            </div>
            
            <div class="col-12 col-sm-2 px-1 d-flex flex-column justify-content-center align-items-center align-items-sm-end" v-if="true">
              <slot name="valores">
                
              </slot>
            </div>
  
            <div class="px-0 d-flex flex-column justify-content-center align-items-center pt-2 pb-1" :class="[ gridBotoes, gridBotoesXL ]">
              <div class="row">
                <div class="col px-1 d-flex flex-inline justify-content-center align-items-center">
                  <slot name="botoes-acoes1">
                    
                  </slot>
                </div>
              </div>
              <div class="row">
                <div class="col px-1 d-flex flex-inline justify-content-center align-items-center">
                  <slot name="botoes-acoes2">
                    
                  </slot>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </template>
  
  <script>
    export default {
      name: "ListaView",
  
      components: {
        // 
      },
  
      props: {
        tamanhoLista: {
          type: Number,
          default: 0,
        },
  
        corBordaStart: {
          type: String,
          default: '',
        },
        
        corBordaTop: {
          type: String,
          default: '',
        },
  
        exibirGridValores: {
          type: Boolean,
          default: true
        },
  
        grid1: {
          type: String,
          default: 'col-12 col-sm-2',
        },
  
        grid1XL: {
          type: String,
          default: 'col-xl-2',
        },
  
        gridDescricoes: {
          type: String,
          default: 'col-sm-5',
        },
  
        gridBadges: {
          type: String,
          default: 'col-sm-1'
        },
  
        gridBotoes: {
          type: String,
          default: 'col-sm-2'
        },
  
        gridBotoesXL: {
          type: String,
          default: 'col-xl-2'
        },
      },
  
      data() {
        return {
          bordaStart: {
            classes: 'border-start border-5'
          }
        }
      },
  
      mounted() {
        if (this.isMobile) {
          // this.bordaStart.classes = 'border-top border-5'
          if (!this.corBordaStart) {
            this.bordaStart.classes = 'border-0'
          } else {
            this.bordaStart.classes = 'border-top border-5'
          }
        } else {
          if (!this.corBordaStart) {
            this.bordaStart.classes = 'border-0'
          } else {
            this.bordaStart.classes = 'border-start border-5'
          }
        }
  
        if (this.gridBotoes == 'col-sm-1') {
          this.gridBadges = 'col-sm-2';
        }
      },
  
      methods: {
        
      },
  
      computed: {
        isMobile() {
          if (screen.width <= 760) {
            return true;
          } else {
            return false;
          }
        },
  
        corSelecionada() {
          return this.bordaStart.classes + ' ' + this.corBordaStart;
        },
      }
    }
  </script>
  
  <style>
  
  </style>