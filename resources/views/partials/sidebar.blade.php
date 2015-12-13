<div class="col-lg-2 col-sm-12 z-depth-2" id="liste">
    <div class="list-group" id="sidebar">
        @if(Entrust::hasRole('owner'))
            <a class="list-group-item" href="{{route('DashBoard.index')}}"><i class="fa fa-home fa-fw"></i>&nbsp; DashBoard</a>
            <a class="list-group-item" href="{{route('superadmin.index')}}"><i class="fa fa-home fa-fw"></i>&nbsp; Admin</a>
        @endif
        <a class="list-group-item" href="{{ route('client.index') }}"><i class="fa fa-users fa-fw"></i>&nbsp; Condidats</a>
        <a class="list-group-item" href="{{ route('examen.index') }}"><i class="fa fa-pencil fa-fw"></i>&nbsp; Examens</a>
        <a class="list-group-item" href="{{ route('vehicules.index') }}"><i class="fa fa-car fa-fw"></i>&nbsp; Cars</a>
        <a class="list-group-item" href="{{ route('cours.index') }}"><i class="fa fa-cog fa-fw"></i>&nbsp; Cours</a>
        <a class="list-group-item" href="{{ route('moniteur.index') }}"><i class="fa fa-user-secret fa-fw"></i>&nbsp; Moniteurs</a>

    </div>
</div>