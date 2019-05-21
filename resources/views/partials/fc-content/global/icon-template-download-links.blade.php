<div class="js-icons hide">
    <div data-icon-src="@asset('images/icons/icon-word.svg')" class="js-word"></div>
    <div data-icon-src="@asset('images/icons/icon-excel.svg')" class="js-excel"></div>
    <div data-icon-src="@asset('images/icons/icon-pdf.svg')" class="js-pdf"></div>
    <div data-icon-src="@asset('images/icons/icon-gsheet.svg')" class="js-gsheet"></div>
    <div data-icon-src="@asset('images/icons/icon-gdoc.svg')" class="js-gdoc"></div>
</div>

@if(get_sub_field('link_word'))
    <div class="three-col-invoice-temp__downloads-wrapper__item">
        <a href="{{ get_sub_field('link_word') }}" download="" target="_blank">
            <img class="icon" src="@asset('images/icons/icon-word.svg')" alt="word icon">
            <div class="icon-text">Word</div>
        </a>
    </div>
@endif
@if(get_sub_field('link_excel'))
    <div class="three-col-invoice-temp__downloads-wrapper__item">
        <a href="{{ get_sub_field('link_excel') }}" download="" target="_blank">
            <img class="icon" src="@asset('images/icons/icon-excel.svg')" alt="excel icon">
            <div class="icon-text">Excel</div>
        </a>
    </div>
@endif
@if(get_sub_field('link_pdf'))
    <div class="three-col-invoice-temp__downloads-wrapper__item">
        <a href="{{ get_sub_field('link_pdf') }}" download="" target="_blank">
            <img class="icon" src="@asset('images/icons/icon-pdf.svg')" alt="pdf icon">
            <div class="icon-text">Pdf</div>
        </a>
    </div>
@endif
@if(get_sub_field('link_gsheet'))
    <div class="three-col-invoice-temp__downloads-wrapper__item">
        <a href="{{ get_sub_field('link_gsheet') }}" download="" target="_blank">
            <img class="icon" src="@asset('images/icons/icon-gsheet.svg')" alt="google sheet icon">
            <div class="icon-text">Gsheet</div>
        </a>
    </div>
@endif
@if(get_sub_field('link_gdoc'))
    <div class="three-col-invoice-temp__downloads-wrapper__item">
        <a href="{{ get_sub_field('link_gdoc') }}" download="" target="_blank">
            <img class="icon" src="@asset('images/icons/icon-gdoc.svg')" alt="google doc icon">
            <div class="icon-text">Gdoc</div>
        </a>
    </div>
@endif