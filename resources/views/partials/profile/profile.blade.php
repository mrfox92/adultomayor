<!-- Start Profile Area -->
<section class="profile-area">
    <div class="profile-header mb-30">
        <div class="user-profile-images">
            
            <img src="{{ asset('img/background/background-profile.jpg') }}" class="cover-image animate__animated animate__fadeIn" alt="image">

            <div class="profile-image">
                @if ( auth()->user()->picture )
                    <img src="{{ auth()->user()->pathAttachment() }}" class="rounded-circle" alt="image">
                @else
                    <img src="{{ asset('img/user1.jpg') }}" class="rounded-circle" alt="image">
                @endif
            </div>

            <div class="user-profile-text">
                <h3>{{ auth()->user()->name }}</h3>
                <span class="d-block">{{ auth()->user()->role->nombre }}</span>
            </div>
        </div>

        <div class="user-profile-nav">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="timeline-tab" data-toggle="tab" href="#timeline" role="tab" aria-controls="timeline" aria-selected="true">Informacion Perfil</a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('perfil.edit', ['id' => auth()->user()->id]) }}" class="nav-link"> Editar Perfil</a>
                </li>
            </ul>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="tab-content">
                <div class="tab-pane fade show active" id="timeline" role="tabpanel" aria-labelledby="timeline-tab">
                    <div class="row">

                        <div class="col-lg-12">

                            <div class="timeline-story-content">
                                <div class="card mb-30">
                                    <div class="card-header">
                                        <h3>{{ auth()->user()->name }}</h3>
                                    </div>
                                    <div class="card-body">
                                        <p>{{ auth()->user()->email }}</p>
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
<!-- End Profile Area -->