<section class="content">


    <div class="row">
        <div class="col-md-9"> 
            <div class="row">                                

                <div class="col-md-12">
                    <section class="invoice" style="height: 725px; ">
                        <legend>Consultorio</legend>
                        @foreach($turnos_en_atencion as $turno_en_atencion)
                        @if (!$turno_en_atencion->enfermero)
                        <div class="animated pulse small-box bg-yellow">
                            <div class="inner">
                                <h3>Consultorio {{$turno_en_atencion->consultorio->nombre}}</h3>
                                <h4><b>{{$turno_en_atencion->paciente->persona->apellido}} {{$turno_en_atencion->paciente->persona->nombre}}</b></h4>
                            </div>
                            <div class="icon">
                                <i class="fa fa-bullhorn"></i>
                            </div>                                                                                
                        </div>
                        @else
                        <div class=" small-box bg-green">
                            <div class="inner">
                                <h3>Consultorio {{$turno_en_atencion->consultorio->nombre}}</h3>
                                <h4><b>{{$turno_en_atencion->paciente->persona->apellido}} {{$turno_en_atencion->paciente->persona->nombre}}</b></h4>
                            </div>
                            <div class="icon">
                                <i class="fa fa-user-md"></i>
                            </div>                                                                                
                        </div>
                        @endif
                        @endforeach
                    </section>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <section class="invoice" style="height: 725px; ">
                <legend>Turnos en espera</legend>
                <ul class="products-list product-list-in-box">
                    @foreach($turnos_esperando as $turno_esperando)
                    <li class="item">
                        <div class="product-img">
                            <img style="width:50px;height:50px"  alt="User Image" class="img-circle img-responsive" src="{{ asset('imagenes/personas/sin-logo.png') }}" >                                                               
                        </div>
                        <div class="product-info">
                            <a href="javascript:void(0)" class="product-title">{{$turno_esperando->paciente->persona->apellido}} {{$turno_esperando->paciente->persona->nombre}}                                                                                                  
                                <span class="product-description">
                                    Hora de arribo: {{$turno_esperando->updated_at->format('h:i A')}}
                                </span>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </section>
        </div> 
    </div>
</section>