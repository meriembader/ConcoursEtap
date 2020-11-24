<div class="modal fade" id="message" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{route('handleEditMessage')}}" method="POST">
                {{ csrf_field() }}

                <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Message</h1>
                  </div>
                  <form class="user" action="{{route('handleEditMessage')}}" method="POST">
                  {{ csrf_field() }}
                    <div class="form-group">
                      <input type="texte" name="objet"class="form-control form-control-user" id="objet"  placeholder="{{__('Objet')}}">
                    </div>
                    <div class="FORM-GROUP">
                      <textarea type="text" class="form-control form-control-user" id="message" placeholder="{{__('Message')}}"></textarea>
                    </div>
                    <div class="modal-footer">
                    <a href="#" class="btn btn-success btn-circle">
                    <i class="fas fa-check"></i>
                  </a>
                  <a href="#" class="btn btn-danger btn-circle">
                    <i class="fas fa-trash"></i>
                  </a>
            </div>
                   
                  </form>
                
         
          </div>

    </div>
</div>