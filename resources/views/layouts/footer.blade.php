<footer class="content-footer">
    @if($data != null)
        <div>© @php echo date("Y"); @endphp All Right Reserved - <a href="#" target="_blank">{{ $data->name_company }}</a></div>
    @else
        <div>© @php echo date("Y"); @endphp All Right Reserved - <a href="#" target="_blank">Sistem Informasi Rental</a></div>
    @endif
    <!-- <div>
        <nav class="nav">
            <a href="https://themeforest.net/licenses/standard" class="nav-link">Licenses</a>
            <a href="#" class="nav-link">Change Log</a>
            <a href="#" class="nav-link">Get Help</a>
        </nav>
    </div> -->
</footer>
