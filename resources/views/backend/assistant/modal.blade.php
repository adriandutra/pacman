<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-delete-{{$node->ID_NodosContables}}">
  
  
  
  {!! Form::open(array('action' => array('Backend\Statical\NodeController@postDestroy', $node->ID_NodosContables))) !!}
   
     <div class="modal-dialog">
        <div class="modal-content">
           <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">x</span>
              </button>
              <h4 class="modal-title">Eliminar Nodo</h4>
           </div>      
           <div class="modal-body">
              <p>Confirme si desea eliminar el Nodo</p>
           </div>
           <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button type="submit" class="btn btn-primary">Confimar</button> 
           </div>
        
        </div>
     </div>
  
  {!!Form::Close()!!}
  
  
</div>
