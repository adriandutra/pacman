<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-delete-{{$camp->ID_Campaign}}">
  
  
  
  {!! Form::open(array('action' => array('Backend\Statical\CampaignController@postDestroy', $camp->ID_Campaign))) !!}
   
     <div class="modal-dialog">
        <div class="modal-content">
           <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">x</span>
              </button>
              <h4 class="modal-title">Eliminar Campa&ntilde;a</h4>
           </div>      
           <div class="modal-body">
              <p>Confirme si desea eliminar la Campa&ntilde;a</p>
           </div>
           <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button type="submit" class="btn btn-primary">Confimar</button> 
           </div>
        
        </div>
     </div>
  
  {!!Form::Close()!!}
  
  
</div>
