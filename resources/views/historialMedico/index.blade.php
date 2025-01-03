@extends('adminlte::page')

@section('title', '')

@section('content_header')
    <h1>Historial Médico</h1>
@stop

@section('content')
    <p>Aqui podra visualizar su historial médico.</p>
    <section class="gradient-custom">
        <div class="container my-5 py-5">
          <div class="row d-flex justify-content-center">
            <div class="col-md-12 col-lg-10 col-xl-8">
              <div class="card">
                <div class="card-body p-4">
                  <h4 class="text-center mb-4 pb-2">Comentarios de los médicos acerca de sus citas médicas </h4>
      
                  <div class="row">
                    <div class="col">
                      <div class="d-flex flex-start">
                        <img class="rounded-circle shadow-1-strong me-3"
                          src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(10).webp" alt="avatar" width="65"
                          height="65" />
                        <div class="flex-grow-1 flex-shrink-1">
                          <div>
                            <div class="d-flex justify-content-between align-items-center">
                              <p class="mb-1">
                                Dra. Maria Smantha <span class="small">- 2 hours ago</span>
                              </p>
                              <a href="#!"><i class="fas fa-reply fa-xs"></i><span class="small"> reply</span></a>
                            </div>
                            <p class="small mb-0">
                              It is a long established fact that a reader will be distracted by
                              the readable content of a page.
                            </p>
                          </div>
      
                          <div class="d-flex flex-start mt-4">
                            <a class="me-3" href="#">
                              <img class="rounded-circle shadow-1-strong"
                                src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(11).webp" alt="avatar"
                                width="65" height="65" />
                            </a>
                            <div class="flex-grow-1 flex-shrink-1">
                              <div>
                                <div class="d-flex justify-content-between align-items-center">
                                  <p class="mb-1">
                                    Dra. Simona Disa <span class="small">- 3 hours ago</span>
                                  </p>
                                </div>
                                <p class="small mb-0">
                                  letters, as opposed to using 'Content here, content here',
                                  making it look like readable English.
                                </p>
                              </div>
                            </div>
                          </div>
      
                          <div class="d-flex flex-start mt-4">
                            <a class="me-3" href="#">
                              <img class="rounded-circle shadow-1-strong"
                                src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(32).webp" alt="avatar"
                                width="65" height="65" />
                            </a>
                            <div class="flex-grow-1 flex-shrink-1">
                              <div>
                                <div class="d-flex justify-content-between align-items-center">
                                  <p class="mb-1">
                                    Dr. John Smith <span class="small">- 4 hours ago</span>
                                  </p>
                                </div>
                                <p class="small mb-0">
                                  the majority have suffered alteration in some form, by
                                  injected humour, or randomised words.
                                </p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
      
                      <div class="d-flex flex-start mt-4">
                        <img class="rounded-circle shadow-1-strong me-3"
                          src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(12).webp" alt="avatar" width="65"
                          height="65" />
                        <div class="flex-grow-1 flex-shrink-1">
                          <div>
                            <div class="d-flex justify-content-between align-items-center">
                              <p class="mb-1">
                                Dra. Natalie Smith <span class="small">- 2 hours ago</span>
                              </p>
                              <a href="#!"><i class="fas fa-reply fa-xs"></i><span class="small"> reply</span></a>
                            </div>
                            <p class="small mb-0">
                              The standard chunk of Lorem Ipsum used since the 1500s is
                              reproduced below for those interested. Sections 1.10.32 and
                              1.10.33.
                            </p>
                          </div>
      
                          <div class="d-flex flex-start mt-4">
                            <a class="me-3" href="#">
                              <img class="rounded-circle shadow-1-strong"
                                src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(31).webp" alt="avatar"
                                width="65" height="65" />
                            </a>
                            <div class="flex-grow-1 flex-shrink-1">
                              <div>
                                <div class="d-flex justify-content-between align-items-center">
                                  <p class="mb-1">
                                    Dra. Lisa Cudrow <span class="small">- 4 hours ago</span>
                                  </p>
                                </div>
                                <p class="small mb-0">
                                  Cras sit amet nibh libero, in gravida nulla. Nulla vel metus
                                  scelerisque ante sollicitudin commodo. Cras purus odio,
                                  vestibulum in vulputate at, tempus viverra turpis.
                                </p>
                              </div>
                            </div>
                          </div>
      
                          <div class="d-flex flex-start mt-4">
                            <a class="me-3" href="#">
                              <img class="rounded-circle shadow-1-strong"
                                src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(29).webp" alt="avatar"
                                width="65" height="65" />
                            </a>
                            <div class="flex-grow-1 flex-shrink-1">
                              <div>
                                <div class="d-flex justify-content-between align-items-center">
                                  <p class="mb-1">
                                    Dra. Maggie McLoan <span class="small">- 5 hours ago</span>
                                  </p>
                                </div>
                                <p class="small mb-0">
                                  a Latin professor at Hampden-Sydney College in Virginia,
                                  looked up one of the more obscure Latin words, consectetur
                                </p>
                              </div>
                            </div>
                          </div>
      
                          <div class="d-flex flex-start mt-4">
                            <a class="me-3" href="#">
                              <img class="rounded-circle shadow-1-strong"
                                src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(32).webp" alt="avatar"
                                width="65" height="65" />
                            </a>
                            <div class="flex-grow-1 flex-shrink-1">
                              <div>
                                <div class="d-flex justify-content-between align-items-center">
                                  <p class="mb-1">
                                    Dr. John Smith <span class="small">- 6 hours ago</span>
                                  </p>
                                </div>
                                <p class="small mb-0">
                                  Autem, totam debitis suscipit saepe sapiente magnam officiis
                                  quaerat necessitatibus odio assumenda, perferendis quae iusto
                                  labore laboriosam minima numquam impedit quam dolorem!
                                </p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}

    
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop