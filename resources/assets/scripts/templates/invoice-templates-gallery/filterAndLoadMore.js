import modal from "./modal";
import { getQueryString } from "../../util/helpers";

export default function () {
    const container = $('.outer-content-wrapper.gallery');
    const loadmoreContainer = $('#loadmoreContainer');
    const url = window.location.protocol + '//' + window.location.host + window.location.pathname;
    const catParam = getQueryString({decode: true})['template_category'];
    const searchParam = getQueryString({decode: true})['search'];
    let searchParamStr = searchParam ? `&search=${searchParam}` : '';
    const wordSrc = $('.js-word').data('icon-src');
    const excelSrc = $('.js-excel').data('icon-src');
    const pdfSrc = $('.js-pdf').data('icon-src');
    const gsheetSrc = $('.js-gsheet').data('icon-src');
    const gdocSrc = $('.js-gdoc').data('icon-src');


    // initial loadmore button and filter bar active state on page load
    if (!catParam) {
        initialActiveState("all");
    } else {
        initialActiveState(catParam);
    }


    //desktop filter
    $('.gallery-category').click(function(e) {
        e.preventDefault();
        const activeCat = $(this).data('cat');

        $('.gallery-category').removeClass('active');
        $(this).addClass('active');

        filterActive(activeCat);
    });


    //mobile filter
    $('.select-nav').change(function(e) {
        e.preventDefault();
        const activeVal = $(this).val();

        filterActive(activeVal);
    });


    function filterActive(aCat) {
        $('#search-header').hide();
        searchParamStr = '';
        container.html('');
        getData( aCat, 1 );
        $('.loadmore-btn').data('page', 1);
    }


    function initialActiveState(acatParam) {
        $(`a[href*="template_category=${acatParam}"]`).addClass('active');
        $('.select-nav').val(acatParam).change();

        $.get( `/wp-json/invoice_templates/posts?category=${acatParam}${searchParamStr}`, function(res) {
            if (res != null && res.next_page) {
                createLoadmore(acatParam, 1);
            } else {
                loadmoreContainer.hide();
            }

            clickLoadmore();
        })
        .fail(function() {
            console.log("Connection error"); //eslint-disable-line
        });
    }


    function createLoadmore(lcatParam, lpageNum) {
        let loadmoreHtml = `<a 
                            data-page="${lpageNum}" data-cat="${lcatParam}" 
                            href="javascript:void(0)" 
                            class="loadmore-btn info-button ghost-button primary-cta"
                        >
                            Load more invoices
                        </a>`;
        loadmoreContainer.html( loadmoreHtml );
    }


    function clickLoadmore() {
        $('.loadmore-btn').click(function(e) {
            e.preventDefault();
            let nextPageNum = Number($('.loadmore-btn').data('page')) + 1;
            const loadmoreCat = $(this).data('cat');

            getData( loadmoreCat, nextPageNum );
        });
    }


    function getData(activeCategoryId, pullPage) {
        window.history.pushState(null, null, url + '?template_category=' + activeCategoryId + searchParamStr);
        $('.gallery-loader-container').css('display','block');

        $.get( `/wp-json/invoice_templates/posts?category=${activeCategoryId}${searchParamStr}&page=${pullPage}`, function(res) {

            $('.gallery-loader-container').css('display','none');
            createPanels(res);
            createLoadmore(activeCategoryId, pullPage);
            clickLoadmore();
            modal();
            res.next_page ? loadmoreContainer.show() : loadmoreContainer.hide();

        })
        .fail(function() {
            $('.gallery-loader-container').css('display','none');
            console.log("Connection error"); //eslint-disable-line
        });
    }


    function createPanels(res) {
        let html = '';

        if (res.posts) {
            res.posts.forEach(post => {
                const gallery_templates = post.flexible_content.gallery_templates;
                if (!gallery_templates) {

                    html = '';

                } else {

                    const acfs = gallery_templates.global_cta_download_templates;
                    if (acfs) {
                        acfs.forEach( element => {
                            let is_premium            = element.is_premium;
                            let title                 = element.title;

                            let thumbnailImage        = element.image.global_image; 
                            let thumbnailImageTitleId = thumbnailImage.title ? thumbnailImage.title.toLowerCase().replace(/[^a-zA-Z]+/, '') : false;
                            let thumbnailImgUrl       = thumbnailImage.url;
                            let thumbnailImgAlt       = thumbnailImage.alt;

                            let thumbnailRetina       = element.image.global_include_retina_image;
                            let thumbnailRetinaUrl    = element.image.global_retina_image.url;
                            let thumbnailLazy         = !(element.image.global_disable_lazy_load);

                            let ctaBtn                = element.cta_btn;
                            let ctaBtnText            = ctaBtn.global_link_text;
                            let ctaBtnUrl             = ctaBtn.global_page_link;
                            let ctaBtnSubtext         = ctaBtn.global_cta_subtext;

                            let downloadLinks         = element.download_links;
                            let linkWord              = downloadLinks.link_word;
                            let linkExcel             = downloadLinks.link_excel;
                            let linkPdf               = downloadLinks.link_pdf;
                            let linkGsheet            = downloadLinks.link_gsheet;
                            let linkGdoc              = downloadLinks.link_gdoc;

                            html += `
                                ${title || thumbnailImgUrl ? `
                                    <div class="three-col-invoice-temp__content-wrapper ${is_premium ? 'premium-panel' : ''}">
                                        ${title ? `<h3>${title}</h3>` : ''}

                                        ${thumbnailImgUrl ?
                                            `
                                                <button class="gallery-modal">
                                                    <img 
                                                        data-src="${thumbnailImgUrl}" 
                                                        src="${thumbnailImgUrl}" 
                                                        id="${thumbnailImageTitleId}" 
                                                        class="${ thumbnailLazy ? 'lazy' : ''} thumbnail initial loaded" 
                                                        alt="${thumbnailImgAlt}" 
                                                        ${thumbnailRetina 
                                                            ? 
                                                                (thumbnailLazy ? `srcset="${thumbnailImgUrl} 1x, ${thumbnailRetinaUrl} 2x"`: '') 
                                                            : 
                                                            ''
                                                        }
                                                    >
                                                </button>

                                                <div class="success-state success-modal">
                                                    <div class="success-modal-content">
                                                        <div class="success-modal-close btn">
                                                            &times;
                                                        </div>

                                                        <img 
                                                            data-src="${thumbnailImgUrl}" 
                                                            src="${thumbnailImgUrl}" 
                                                            id="${thumbnailImageTitleId}" 
                                                            class="${ thumbnailLazy ? 'lazy' : ''} modal-img initial loaded" 
                                                            alt="${thumbnailImgAlt}" 
                                                            ${thumbnailRetina 
                                                                ? 
                                                                    (thumbnailLazy ? `srcset="${thumbnailImgUrl} 1x, ${thumbnailRetinaUrl} 2x"`: '') 
                                                                : 
                                                                ''
                                                            }
                                                        >

                                                        <p class="success-modal-close">
                                                            Close window
                                                        </p>
                                                    </div>
                                                </div>
                                            `
                                        : ''}

                                        <div class="three-col-invoice-temp__downloads-wrapper">
                                            ${linkWord ?
                                                `
                                                    <div class="three-col-invoice-temp__downloads-wrapper__item">
                                                        <a href="${linkWord}" download="" target="_blank">
                                                            <img class="icon" src="${wordSrc}" alt="word icon">
                                                            <div class="icon-text">Word</div>
                                                        </a>
                                                    </div>
                                                `
                                            : ''}

                                            ${linkExcel ?
                                                `
                                                    <div class="three-col-invoice-temp__downloads-wrapper__item">
                                                        <a href="${linkExcel}" download="" target="_blank">
                                                            <img class="icon" src="${excelSrc}" alt="excel icon">
                                                            <div class="icon-text">Excel</div>
                                                        </a>
                                                    </div>
                                                `
                                            : ''}

                                            ${linkPdf ?
                                                `
                                                    <div class="three-col-invoice-temp__downloads-wrapper__item">
                                                        <a href="${linkPdf}" download="" target="_blank">
                                                            <img class="icon" src="${pdfSrc}" alt="pdf icon">
                                                            <div class="icon-text">Pdf</div>
                                                        </a>
                                                    </div>
                                                `
                                            : ''}

                                            ${linkGsheet ?
                                                `
                                                    <div class="three-col-invoice-temp__downloads-wrapper__item">
                                                        <a href="${linkGsheet}" download="" target="_blank">
                                                            <img class="icon" src="${gsheetSrc}" alt="google sheet icon">
                                                            <div class="icon-text">Gsheet</div>
                                                        </a>
                                                    </div>
                                                `
                                            : ''}

                                            ${linkGdoc ?
                                                `
                                                    <div class="three-col-invoice-temp__downloads-wrapper__item">
                                                        <a href="${linkGdoc}" download="" target="_blank">
                                                            <img class="icon" src="${gdocSrc}" alt="google doc icon">
                                                            <div class="icon-text">Gdoc</div>
                                                        </a>
                                                    </div>
                                                `
                                            : ''}
                                        </div>

                                        ${ctaBtnText ?
                                            `
                                                <a href="${ctaBtnUrl}" class="three-col-invoice-temp__cta-btn primary-cta">${ctaBtnText}</a>
                                            ` 
                                        : ''}


                                        ${ctaBtnSubtext ? `<span class="subtext">${ctaBtnSubtext}</span>` : ''}
                                    </div>
                                `: ''}
                            `;
                        });
                    }
                }
            })
        }

        container.append(html);
    }
}