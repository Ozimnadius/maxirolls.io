<?php
header('Content-Type: application/json');

$data = $_POST;
$action = $data['action'];
switch ($action) {
    case 'callorderSubmit':
        echo json_encode(array(
            'status' => true,
            'html' => '<div class="callorder__success">Спасибо мы скоро с Вами свяжемся.</div>'
        ));
        exit();
        break;
    case 'sms':
        echo json_encode(array(
            'status' => true,
        ));
        exit();
        break;
    case 'editAddrs':
        echo json_encode(array(
            'status' => true,
            'html' => getEditAddrs()
        ));
        exit();
        break;
    case 'delAddr':
        echo json_encode(array(
            'status' => true
        ));
        exit();
        break;
    case 'addAddr':
        echo json_encode(array(
            'status' => true,
            'html' => getEditAddrs()
        ));
        exit();
        break;
    case 'searchAddr':
        echo json_encode(array(
            'status' => true,
            'html' => getSearchAddrs()
        ));
        exit();
        break;
    case 'editAddr':
        echo json_encode(array(
            'status' => true,
            'html' => getEditAddr()
        ));
        exit();
        break;

    case 'getProduct':
        echo json_encode(array(
            'status' => true,
            'html' => getProduct($_POST['id'])
        ));
        exit();
        break;
    case 'getAction':
        echo json_encode(array(
            'status' => true,
            'html' => getAction()
        ));
        exit();
        break;
    default:
        echo json_encode(array(
            'status' => false,
        ));
        exit();
        break;
}

function getProduct($id)
{
    if ($id == 'simple'):
        ob_start(); ?>
        <form class="product">
            <button class="jsFormClose product__close" type="button">
                <svg width="30" height="30" viewBox="0 0 30 30" xmlns="http://www.w3.org/2000/svg">
                    <path d="M17.7485 14.9999L29.4299 3.31816C30.1901 2.55831 30.1901 1.32974 29.4299 0.569888C28.67 -0.189963 27.4415 -0.189963 26.6816 0.569888L14.9998 12.2516L3.31843 0.569888C2.55822 -0.189963 1.33001 -0.189963 0.570155 0.569888C-0.190052 1.32974 -0.190052 2.55831 0.570155 3.31816L12.2516 14.9999L0.570155 26.6817C-0.190052 27.4415 -0.190052 28.6701 0.570155 29.43C0.948835 29.809 1.44674 29.9994 1.94429 29.9994C2.44184 29.9994 2.93939 29.809 3.31843 29.43L14.9998 17.7482L26.6816 29.43C27.0607 29.809 27.5582 29.9994 28.0558 29.9994C28.5533 29.9994 29.0509 29.809 29.4299 29.43C30.1901 28.6701 30.1901 27.4415 29.4299 26.6817L17.7485 14.9999Z"/>
                </svg>
                <svg width="25" height="14" viewBox="0 0 25 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M23 2L12.5 11L2 2" stroke="#1F1F1F" stroke-width="4"/>
                </svg>
            </button>
            <div class="product__info">
                <div class="prinfo">
                    <button class="prinfo__btn" type="button">i</button>
                    <div class="prinfo__content">
                        <div class="prinfo__title">Пищевая ценность на 100 г</div>
                        <ul class="prinfo__list">
                            <li class="prinfo__item">
                                <div class="prinfo__name">Энерг. ценность</div>
                                <div class="prinfo__val">301,1 ккал</div>
                            </li>
                            <li class="prinfo__item">
                                <div class="prinfo__name">Энерг. ценность</div>
                                <div class="prinfo__val">9,4 г</div>
                            </li>
                            <li class="prinfo__item">
                                <div class="prinfo__name">Жиры</div>
                                <div class="prinfo__val">15,5 г</div>
                            </li>
                            <li class="prinfo__item">
                                <div class="prinfo__name">Углеводы</div>
                                <div class="prinfo__val">28,8 г</div>
                            </li>
                            <li class="prinfo__item">
                                <div class="prinfo__name">Вес</div>
                                <div class="prinfo__val">410 г</div>
                            </li>
                            <li class="prinfo__item">
                                <div class="prinfo__name">Диаметр</div>
                                <div class="prinfo__val">410 г</div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="product__left">
                <div class="product__img"><img class="undefined" src="images/content/popup/pizza.png" alt="lorem"/>
                </div>
            </div>
            <div class="product__right">
                <div class="product__top">
                    <h3 class="product__title">Испанские колбаски чоризо</h3>
                    <div class="product__char">30 см, традиционное тесто, 350 г</div>
                    <div class="product__composition">
                        <label class="pcomposition">
                            <input class="pcomposition__input" type="checkbox" name="composition" value="Острая чоризо"
                                   checked><span class="pcomposition__fake"><span class="pcomposition__title">Острая чоризо</span><span
                                        class="pcomposition__btn"><svg width="7" height="7" viewBox="0 0 7 7"
                                                                       xmlns="http://www.w3.org/2000/svg">
<path d="M6.00558 5.10641L4.36052 3.46369L6.00558 1.82097C6.23219 1.59436 6.23219 1.22653 6.00617 0.999306C5.77897 0.771521 5.41114 0.772106 5.18394 0.99872L3.53773 2.64261L1.89153 0.99872C1.66433 0.772106 1.2965 0.771521 1.0693 0.999306C0.842688 1.22651 0.842687 1.59433 1.06989 1.82097L2.71495 3.46369L1.06989 5.10641C0.842687 5.33303 0.842688 5.70085 1.0693 5.92808C1.18262 6.04196 1.33195 6.09833 1.48072 6.09833C1.62949 6.09833 1.77823 6.04137 1.89156 5.92864L3.53776 4.28475L5.18397 5.92864C5.29729 6.04196 5.44603 6.09833 5.59481 6.09833C5.74358 6.09833 5.8929 6.04137 6.00623 5.92808C6.23278 5.70085 6.23278 5.33303 6.00558 5.10641Z"/>
</svg>
<svg width="7" height="7" viewBox="0 0 7 7" xmlns="http://www.w3.org/2000/svg">
<path d="M0.00241613 3.0625V0L1.03054 1.02812C1.66273 0.39375 2.53554 0 3.50243 0C5.43617 0 6.99805 1.56624 6.99805 3.50001C6.99805 5.43378 5.43617 7.00002 3.50243 7.00002C1.87273 7.00002 0.507729 5.88439 0.120541 4.37502H1.03054C1.39147 5.3944 2.35836 6.12501 3.50241 6.12501C4.95272 6.12501 6.12741 4.95032 6.12741 3.50001C6.12741 2.0497 4.95272 0.875008 3.50241 0.875008C2.77834 0.875008 2.12865 1.17688 1.65397 1.65158L3.06491 3.06252H0.00241613V3.0625Z"/>
</svg></span>,&nbsp;</span>
                        </label>
                        <label class="pcomposition">
                            <input class="pcomposition__input" type="checkbox" name="composition" value="томаты"
                                   checked><span class="pcomposition__fake"><span
                                        class="pcomposition__title">томаты</span><span class="pcomposition__btn"><svg
                                            width="7" height="7" viewBox="0 0 7 7" xmlns="http://www.w3.org/2000/svg">
<path d="M6.00558 5.10641L4.36052 3.46369L6.00558 1.82097C6.23219 1.59436 6.23219 1.22653 6.00617 0.999306C5.77897 0.771521 5.41114 0.772106 5.18394 0.99872L3.53773 2.64261L1.89153 0.99872C1.66433 0.772106 1.2965 0.771521 1.0693 0.999306C0.842688 1.22651 0.842687 1.59433 1.06989 1.82097L2.71495 3.46369L1.06989 5.10641C0.842687 5.33303 0.842688 5.70085 1.0693 5.92808C1.18262 6.04196 1.33195 6.09833 1.48072 6.09833C1.62949 6.09833 1.77823 6.04137 1.89156 5.92864L3.53776 4.28475L5.18397 5.92864C5.29729 6.04196 5.44603 6.09833 5.59481 6.09833C5.74358 6.09833 5.8929 6.04137 6.00623 5.92808C6.23278 5.70085 6.23278 5.33303 6.00558 5.10641Z"/>
</svg>
<svg width="7" height="7" viewBox="0 0 7 7" xmlns="http://www.w3.org/2000/svg">
<path d="M0.00241613 3.0625V0L1.03054 1.02812C1.66273 0.39375 2.53554 0 3.50243 0C5.43617 0 6.99805 1.56624 6.99805 3.50001C6.99805 5.43378 5.43617 7.00002 3.50243 7.00002C1.87273 7.00002 0.507729 5.88439 0.120541 4.37502H1.03054C1.39147 5.3944 2.35836 6.12501 3.50241 6.12501C4.95272 6.12501 6.12741 4.95032 6.12741 3.50001C6.12741 2.0497 4.95272 0.875008 3.50241 0.875008C2.77834 0.875008 2.12865 1.17688 1.65397 1.65158L3.06491 3.06252H0.00241613V3.0625Z"/>
</svg></span>,&nbsp;</span>
                        </label>
                        <label class="pcomposition">
                            <input class="pcomposition__input" type="checkbox" name="composition" value="цыплёнок"
                                   checked><span class="pcomposition__fake"><span
                                        class="pcomposition__title">цыплёнок</span><span class="pcomposition__btn"><svg
                                            width="7" height="7" viewBox="0 0 7 7" xmlns="http://www.w3.org/2000/svg">
<path d="M6.00558 5.10641L4.36052 3.46369L6.00558 1.82097C6.23219 1.59436 6.23219 1.22653 6.00617 0.999306C5.77897 0.771521 5.41114 0.772106 5.18394 0.99872L3.53773 2.64261L1.89153 0.99872C1.66433 0.772106 1.2965 0.771521 1.0693 0.999306C0.842688 1.22651 0.842687 1.59433 1.06989 1.82097L2.71495 3.46369L1.06989 5.10641C0.842687 5.33303 0.842688 5.70085 1.0693 5.92808C1.18262 6.04196 1.33195 6.09833 1.48072 6.09833C1.62949 6.09833 1.77823 6.04137 1.89156 5.92864L3.53776 4.28475L5.18397 5.92864C5.29729 6.04196 5.44603 6.09833 5.59481 6.09833C5.74358 6.09833 5.8929 6.04137 6.00623 5.92808C6.23278 5.70085 6.23278 5.33303 6.00558 5.10641Z"/>
</svg>
<svg width="7" height="7" viewBox="0 0 7 7" xmlns="http://www.w3.org/2000/svg">
<path d="M0.00241613 3.0625V0L1.03054 1.02812C1.66273 0.39375 2.53554 0 3.50243 0C5.43617 0 6.99805 1.56624 6.99805 3.50001C6.99805 5.43378 5.43617 7.00002 3.50243 7.00002C1.87273 7.00002 0.507729 5.88439 0.120541 4.37502H1.03054C1.39147 5.3944 2.35836 6.12501 3.50241 6.12501C4.95272 6.12501 6.12741 4.95032 6.12741 3.50001C6.12741 2.0497 4.95272 0.875008 3.50241 0.875008C2.77834 0.875008 2.12865 1.17688 1.65397 1.65158L3.06491 3.06252H0.00241613V3.0625Z"/>
</svg></span>,&nbsp;</span>
                        </label>
                        <label class="pcomposition">
                            <input class="pcomposition__input" type="checkbox" name="composition"
                                   value="сыры чеддер и пармезан" checked><span class="pcomposition__fake"><span
                                        class="pcomposition__title">сыры чеддер и пармезан</span><span
                                        class="pcomposition__btn"><svg width="7" height="7" viewBox="0 0 7 7"
                                                                       xmlns="http://www.w3.org/2000/svg">
<path d="M6.00558 5.10641L4.36052 3.46369L6.00558 1.82097C6.23219 1.59436 6.23219 1.22653 6.00617 0.999306C5.77897 0.771521 5.41114 0.772106 5.18394 0.99872L3.53773 2.64261L1.89153 0.99872C1.66433 0.772106 1.2965 0.771521 1.0693 0.999306C0.842688 1.22651 0.842687 1.59433 1.06989 1.82097L2.71495 3.46369L1.06989 5.10641C0.842687 5.33303 0.842688 5.70085 1.0693 5.92808C1.18262 6.04196 1.33195 6.09833 1.48072 6.09833C1.62949 6.09833 1.77823 6.04137 1.89156 5.92864L3.53776 4.28475L5.18397 5.92864C5.29729 6.04196 5.44603 6.09833 5.59481 6.09833C5.74358 6.09833 5.8929 6.04137 6.00623 5.92808C6.23278 5.70085 6.23278 5.33303 6.00558 5.10641Z"/>
</svg>
<svg width="7" height="7" viewBox="0 0 7 7" xmlns="http://www.w3.org/2000/svg">
<path d="M0.00241613 3.0625V0L1.03054 1.02812C1.66273 0.39375 2.53554 0 3.50243 0C5.43617 0 6.99805 1.56624 6.99805 3.50001C6.99805 5.43378 5.43617 7.00002 3.50243 7.00002C1.87273 7.00002 0.507729 5.88439 0.120541 4.37502H1.03054C1.39147 5.3944 2.35836 6.12501 3.50241 6.12501C4.95272 6.12501 6.12741 4.95032 6.12741 3.50001C6.12741 2.0497 4.95272 0.875008 3.50241 0.875008C2.77834 0.875008 2.12865 1.17688 1.65397 1.65158L3.06491 3.06252H0.00241613V3.0625Z"/>
</svg></span>,&nbsp;</span>
                        </label><span class="pcomposition pcomposition__txt">моцарелла,&nbsp</span><span
                                class="pcomposition pcomposition__txt">пикантный соус чипотлестрая чоризо</span>
                    </div>
                </div>
                <div class="product__bottom">
                    <button class="product__add" type="button"><span class="product__add-txt">Добавить в корзину за&nbsp;</span><span
                                class="product__add-price">400 ₽</span></button>
                </div>
            </div>
        </form>
    <? elseif ($id == 'set'):
        ob_start(); ?>
        <form class="product">
            <button class="jsFormClose product__close" type="button">
                <svg width="30" height="30" viewBox="0 0 30 30" xmlns="http://www.w3.org/2000/svg">
                    <path d="M17.7485 14.9999L29.4299 3.31816C30.1901 2.55831 30.1901 1.32974 29.4299 0.569888C28.67 -0.189963 27.4415 -0.189963 26.6816 0.569888L14.9998 12.2516L3.31843 0.569888C2.55822 -0.189963 1.33001 -0.189963 0.570155 0.569888C-0.190052 1.32974 -0.190052 2.55831 0.570155 3.31816L12.2516 14.9999L0.570155 26.6817C-0.190052 27.4415 -0.190052 28.6701 0.570155 29.43C0.948835 29.809 1.44674 29.9994 1.94429 29.9994C2.44184 29.9994 2.93939 29.809 3.31843 29.43L14.9998 17.7482L26.6816 29.43C27.0607 29.809 27.5582 29.9994 28.0558 29.9994C28.5533 29.9994 29.0509 29.809 29.4299 29.43C30.1901 28.6701 30.1901 27.4415 29.4299 26.6817L17.7485 14.9999Z"/>
                </svg>
                <svg width="25" height="14" viewBox="0 0 25 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M23 2L12.5 11L2 2" stroke="#1F1F1F" stroke-width="4"/>
                </svg>
            </button>
            <div class="product__info">
                <div class="prinfo">
                    <button class="prinfo__btn" type="button">i</button>
                    <div class="prinfo__content">
                        <div class="prinfo__title">Пищевая ценность на 100 г</div>
                        <ul class="prinfo__list">
                            <li class="prinfo__item">
                                <div class="prinfo__name">Энерг. ценность</div>
                                <div class="prinfo__val">301,1 ккал</div>
                            </li>
                            <li class="prinfo__item">
                                <div class="prinfo__name">Энерг. ценность</div>
                                <div class="prinfo__val">9,4 г</div>
                            </li>
                            <li class="prinfo__item">
                                <div class="prinfo__name">Жиры</div>
                                <div class="prinfo__val">15,5 г</div>
                            </li>
                            <li class="prinfo__item">
                                <div class="prinfo__name">Углеводы</div>
                                <div class="prinfo__val">28,8 г</div>
                            </li>
                            <li class="prinfo__item">
                                <div class="prinfo__name">Вес</div>
                                <div class="prinfo__val">410 г</div>
                            </li>
                            <li class="prinfo__item">
                                <div class="prinfo__name">Диаметр</div>
                                <div class="prinfo__val">410 г</div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="product__left">
                <div class="product__img"><img class="undefined" src="images/content/popup/set.png" alt="lorem"/>
                </div>
                <div class="product__wrap">
                    <div class="product__wrap-img">
                        <img class="undefined" src="images/content/popup/set.png" alt="lorem"/>
                    </div>
                    <h3 class="product__wrap-title"></h3>
                    <div class="product__wrap-desc"></div>
                    <div class="product__wrap-char"></div>
                    <button type="button" class="product__wrap-close">
                        <svg width="31" height="8" viewBox="0 0 31 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0.646444 3.64644C0.451183 3.84171 0.451183 4.15829 0.646444 4.35355L3.82842 7.53553C4.02369 7.73079 4.34027 7.73079 4.53553 7.53553C4.73079 7.34027 4.73079 7.02369 4.53553 6.82842L1.70711 4L4.53553 1.17157C4.7308 0.976308 4.7308 0.659726 4.53553 0.464464C4.34027 0.269202 4.02369 0.269202 3.82842 0.464464L0.646444 3.64644ZM31 3.5L0.999998 3.5L0.999998 4.5L31 4.5L31 3.5Z"
                                  fill="#333333"/>
                        </svg>
                        Вернуться назад
                    </button>
                </div>
            </div>
            <div class="product__right">
                <div class="product__top">
                    <h3 class="product__title">Комбо за 599 ₽</h3>
                    <div class="product__desc">Быстрый заказ: наш хит «Аррива!» или другая пицца 25 см, Додстер, напиток
                        и соус. Выбор пицц ограничен
                    </div>
                    <div class="product__list">
                        <div class="product__item pitem">
                            <div class="pitem__arr">
                                <svg width="8" height="13" viewBox="0 0 8 13" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path d="M6.5 12L1 6.5L6.5 1" stroke-width="2" stroke-linecap="round"
                                          stroke-linejoin="round"/>
                                </svg>
                            </div>
                            <div class="pitem__img"><img class="undefined" src="images/content/pizza/1.jpg"
                                                         alt="lorem"/>
                            </div>
                            <div class="pitem__desc">
                                <div class="pitem__title">Аррива!</div>
                                <div class="pitem__txt">Соус бургер, цыпленок, соус ранч, чоризо, сладкий перец, красный
                                    лук, моцарелла, томаты, чеснок
                                </div>
                                <div class="pitem__char">30 см, традиционное тесто, 350 г</div>
                            </div>
                        </div>
                        <div class="product__item pitem">
                            <div class="pitem__arr">
                                <svg width="8" height="13" viewBox="0 0 8 13" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path d="M6.5 12L1 6.5L6.5 1" stroke-width="2" stroke-linecap="round"
                                          stroke-linejoin="round"/>
                                </svg>
                            </div>
                            <div class="pitem__img"><img class="undefined" src="images/content/popup/dodster.png"
                                                         alt="lorem"/>
                            </div>
                            <div class="pitem__desc">
                                <div class="pitem__title">Додстер</div>
                                <div class="pitem__txt">Легендарная горячая закуска с цыпленком, томатами, соусом ранч в
                                    тонкой пшеничной лепешке, моцареллой
                                </div>
                                <div class="pitem__char">30 см, традиционное тесто, 350 г</div>
                            </div>
                        </div>
                        <div class="product__item pitem">
                            <div class="pitem__arr">
                                <svg width="8" height="13" viewBox="0 0 8 13" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path d="M6.5 12L1 6.5L6.5 1" stroke-width="2" stroke-linecap="round"
                                          stroke-linejoin="round"/>
                                </svg>
                            </div>
                            <div class="pitem__img"><img class="undefined" src="images/content/popup/cola.png"
                                                         alt="lorem"/>
                            </div>
                            <div class="pitem__desc">
                                <div class="pitem__title">Coca-cola</div>
                                <div class="pitem__txt">0,5 л</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product__bottom">
                    <div class="product__total">
                        <div class="product__total-name">Стоимость</div>
                        <div class="product__total-price">
                            <div class="product__prices">
                                <div class="product__priceold">1 280 ₽</div>
                                <div class="product__price">1 280 ₽</div>
                            </div>
                        </div>
                    </div>
                    <button class="product__add" type="button"><span class="product__add-txt">Добавить в корзину</span>
                    </button>
                </div>
            </div>
        </form>
    <? elseif ($id == 'sushi'):
        ob_start(); ?>
        <form class="product">
            <button class="jsFormClose product__close" type="button">
                <svg width="30" height="30" viewBox="0 0 30 30" xmlns="http://www.w3.org/2000/svg">
                    <path d="M17.7485 14.9999L29.4299 3.31816C30.1901 2.55831 30.1901 1.32974 29.4299 0.569888C28.67 -0.189963 27.4415 -0.189963 26.6816 0.569888L14.9998 12.2516L3.31843 0.569888C2.55822 -0.189963 1.33001 -0.189963 0.570155 0.569888C-0.190052 1.32974 -0.190052 2.55831 0.570155 3.31816L12.2516 14.9999L0.570155 26.6817C-0.190052 27.4415 -0.190052 28.6701 0.570155 29.43C0.948835 29.809 1.44674 29.9994 1.94429 29.9994C2.44184 29.9994 2.93939 29.809 3.31843 29.43L14.9998 17.7482L26.6816 29.43C27.0607 29.809 27.5582 29.9994 28.0558 29.9994C28.5533 29.9994 29.0509 29.809 29.4299 29.43C30.1901 28.6701 30.1901 27.4415 29.4299 26.6817L17.7485 14.9999Z"/>
                </svg>
                <svg width="25" height="14" viewBox="0 0 25 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M23 2L12.5 11L2 2" stroke="#1F1F1F" stroke-width="4"/>
                </svg>
            </button>
            <div class="product__info">
                <div class="prinfo">
                    <button class="prinfo__btn" type="button">i</button>
                    <div class="prinfo__content">
                        <div class="prinfo__title">Пищевая ценность на 100 г</div>
                        <ul class="prinfo__list">
                            <li class="prinfo__item">
                                <div class="prinfo__name">Энерг. ценность</div>
                                <div class="prinfo__val">301,1 ккал</div>
                            </li>
                            <li class="prinfo__item">
                                <div class="prinfo__name">Энерг. ценность</div>
                                <div class="prinfo__val">9,4 г</div>
                            </li>
                            <li class="prinfo__item">
                                <div class="prinfo__name">Жиры</div>
                                <div class="prinfo__val">15,5 г</div>
                            </li>
                            <li class="prinfo__item">
                                <div class="prinfo__name">Углеводы</div>
                                <div class="prinfo__val">28,8 г</div>
                            </li>
                            <li class="prinfo__item">
                                <div class="prinfo__name">Вес</div>
                                <div class="prinfo__val">410 г</div>
                            </li>
                            <li class="prinfo__item">
                                <div class="prinfo__name">Диаметр</div>
                                <div class="prinfo__val">410 г</div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="product__left">
                <div class="product__stick">Новинка</div>
                <div class="product__img"><img class="undefined" src="images/content/catalog/6.jpg" alt="lorem"/>
                </div>
                <div class="product__wrap">
                    <div class="product__wrap-desc">К данному сету бесплатно прилагаются: имбирь 80гр, васаби 40гр,
                        соевый соус 4 пакетика, 4 прибора.
                    </div>
                </div>
            </div>
            <div class="product__right">
                <div class="product__top">
                    <h3 class="product__title">Сет с лососем</h3>
                    <div class="product__char">1050 гр | 28 шт</div>
                    <ul class="product__ul">
                        <li class="product__li">Горячий с крабом,</li>
                        <li class="product__li">Бонито ролл с окунем,</li>
                        <li class="product__li">1/2 Запеченный с курицей,</li>
                        <li class="product__li">1/2 Запеченный крабовый микс,</li>
                        <li class="product__li">1/2 Холодный с курицей,</li>
                        <li class="product__li">1/2 Холодный крабовый микс.</li>
                    </ul>
                    <div class="product__structure">
                        Начинка на выбор, огурец, сыр Филадельфия, икра масага, майонезная шапочка.
                        <br>
                        <br>
                        К данному сету бесплатно прилагаются:
                        имбирь 80гр, васаби 40гр, соевый соус 4 пакетика, 4 прибора.
                    </div>
                </div>
                <div class="product__bottom">
                    <div class="product__slider prslider">
                        <div class="prslider__top">
                            <h3 class="prslider__title">Добавить к заказу</h3>
                            <div class="prslider__nav"><a class="prslider__arr prslider__prev" href="#">
                                    <svg width="34" height="8" viewBox="0 0 34 8" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0.646446 3.64644C0.451183 3.84171 0.451183 4.15829 0.646446 4.35355L3.82843 7.53553C4.02369 7.73079 4.34027 7.73079 4.53553 7.53553C4.7308 7.34027 4.7308 7.02369 4.53553 6.82842L1.70711 4L4.53553 1.17157C4.7308 0.976308 4.7308 0.659726 4.53553 0.464464C4.34027 0.269201 4.02369 0.269201 3.82843 0.464463L0.646446 3.64644ZM34 3.5L1 3.5L1 4.5L34 4.5L34 3.5Z"/>
                                    </svg>
                                </a><a class="prslider__arr prslider__next" href="#">
                                    <svg width="34" height="8" viewBox="0 0 34 8" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M33.3536 4.35355C33.5488 4.15829 33.5488 3.84171 33.3536 3.64645L30.1716 0.464466C29.9763 0.269204 29.6597 0.269204 29.4645 0.464466C29.2692 0.659728 29.2692 0.976311 29.4645 1.17157L32.2929 4L29.4645 6.82843C29.2692 7.02369 29.2692 7.34027 29.4645 7.53553C29.6597 7.7308 29.9763 7.7308 30.1716 7.53553L33.3536 4.35355ZM0 4.5H33V3.5H0V4.5Z"/>
                                    </svg>
                                </a></div>
                        </div>
                        <div class="prslider__bottom"></div>
                        <div class="prslider__container swiper-container">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide badd">
                                    <div class="badd__top"><a class="badd__img" href="/"><img class="undefined"
                                                                                              src="images/content/basket/1.jpg"
                                                                                              alt="lorem"/></a></div>
                                    <div class="badd__bottom"><a class="badd__title" href="/">Палочки для суши</a>
                                        <div class="badd__price">3 ₽</div>
                                    </div>
                                    <div class="badd__btns"><a class="badd__btn badd__minus disabled" href="#">
                                            <svg width="14" height="4" viewBox="0 0 14 4" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path d="M13.8756 3.5797H0.458984V0.217377H13.8756V3.5797Z"
                                                      fill="white"/>
                                            </svg>
                                        </a><a class="badd__btn badd__plus" href="#">
                                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5.42409 13.348H8.41561V8.32366H13.454V5.43009H8.41561V0.405792H5.42409V5.43009H0.385742V8.32366H5.42409V13.348Z"
                                                      fill="white"/>
                                            </svg>
                                        </a></div>
                                    <div class="badd__count"><span class="badd__count-val"></span><span
                                                class="badd__count-txt">&nbsp;шт.</span></div>
                                </div>
                                <div class="swiper-slide badd">
                                    <div class="badd__top"><a class="badd__img" href="/"><img class="undefined"
                                                                                              src="images/content/basket/2.jpg"
                                                                                              alt="lorem"/></a></div>
                                    <div class="badd__bottom"><a class="badd__title" href="/">Имбирь +васаби</a>
                                        <div class="badd__price">30 ₽</div>
                                    </div>
                                    <div class="badd__btns"><a class="badd__btn badd__minus disabled" href="#">
                                            <svg width="14" height="4" viewBox="0 0 14 4" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path d="M13.8756 3.5797H0.458984V0.217377H13.8756V3.5797Z"
                                                      fill="white"/>
                                            </svg>
                                        </a><a class="badd__btn badd__plus" href="#">
                                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5.42409 13.348H8.41561V8.32366H13.454V5.43009H8.41561V0.405792H5.42409V5.43009H0.385742V8.32366H5.42409V13.348Z"
                                                      fill="white"/>
                                            </svg>
                                        </a></div>
                                    <div class="badd__count"><span class="badd__count-val"></span><span
                                                class="badd__count-txt">&nbsp;шт.</span></div>
                                </div>
                                <div class="swiper-slide badd">
                                    <div class="badd__top"><a class="badd__img" href="/"><img class="undefined"
                                                                                              src="images/content/basket/3.jpg"
                                                                                              alt="lorem"/></a></div>
                                    <div class="badd__bottom"><a class="badd__title" href="/">Имбирь</a>
                                        <div class="badd__price">20 ₽</div>
                                    </div>
                                    <div class="badd__btns"><a class="badd__btn badd__minus disabled" href="#">
                                            <svg width="14" height="4" viewBox="0 0 14 4" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path d="M13.8756 3.5797H0.458984V0.217377H13.8756V3.5797Z"
                                                      fill="white"/>
                                            </svg>
                                        </a><a class="badd__btn badd__plus" href="#">
                                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5.42409 13.348H8.41561V8.32366H13.454V5.43009H8.41561V0.405792H5.42409V5.43009H0.385742V8.32366H5.42409V13.348Z"
                                                      fill="white"/>
                                            </svg>
                                        </a></div>
                                    <div class="badd__count"><span class="badd__count-val"></span><span
                                                class="badd__count-txt">&nbsp;шт.</span></div>
                                </div>
                                <div class="swiper-slide badd">
                                    <div class="badd__top"><a class="badd__img" href="/"><img class="undefined"
                                                                                              src="images/content/basket/4.jpg"
                                                                                              alt="lorem"/></a></div>
                                    <div class="badd__bottom"><a class="badd__title" href="/">Васаби</a>
                                        <div class="badd__price">20 ₽</div>
                                    </div>
                                    <div class="badd__btns"><a class="badd__btn badd__minus disabled" href="#">
                                            <svg width="14" height="4" viewBox="0 0 14 4" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path d="M13.8756 3.5797H0.458984V0.217377H13.8756V3.5797Z"
                                                      fill="white"/>
                                            </svg>
                                        </a><a class="badd__btn badd__plus" href="#">
                                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5.42409 13.348H8.41561V8.32366H13.454V5.43009H8.41561V0.405792H5.42409V5.43009H0.385742V8.32366H5.42409V13.348Z"
                                                      fill="white"/>
                                            </svg>
                                        </a></div>
                                    <div class="badd__count"><span class="badd__count-val"></span><span
                                                class="badd__count-txt">&nbsp;шт.</span></div>
                                </div>
                                <div class="swiper-slide badd">
                                    <div class="badd__top"><a class="badd__img" href="/"><img class="undefined"
                                                                                              src="images/content/basket/5.jpg"
                                                                                              alt="lorem"/></a></div>
                                    <div class="badd__bottom"><a class="badd__title" href="/">Соевый соус</a>
                                        <div class="badd__price">20 ₽</div>
                                    </div>
                                    <div class="badd__btns"><a class="badd__btn badd__minus disabled" href="#">
                                            <svg width="14" height="4" viewBox="0 0 14 4" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path d="M13.8756 3.5797H0.458984V0.217377H13.8756V3.5797Z"
                                                      fill="white"/>
                                            </svg>
                                        </a><a class="badd__btn badd__plus" href="#">
                                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5.42409 13.348H8.41561V8.32366H13.454V5.43009H8.41561V0.405792H5.42409V5.43009H0.385742V8.32366H5.42409V13.348Z"
                                                      fill="white"/>
                                            </svg>
                                        </a></div>
                                    <div class="badd__count"><span class="badd__count-val"></span><span
                                                class="badd__count-txt">&nbsp;шт.</span></div>
                                </div>
                                <div class="swiper-slide badd">
                                    <div class="badd__top"><a class="badd__img" href="/"><img class="undefined"
                                                                                              src="images/content/basket/6.jpg"
                                                                                              alt="lorem"/></a></div>
                                    <div class="badd__bottom"><a class="badd__title" href="/">Палочки для суши</a>
                                        <div class="badd__price">3 ₽</div>
                                    </div>
                                    <div class="badd__btns"><a class="badd__btn badd__minus disabled" href="#">
                                            <svg width="14" height="4" viewBox="0 0 14 4" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path d="M13.8756 3.5797H0.458984V0.217377H13.8756V3.5797Z"
                                                      fill="white"/>
                                            </svg>
                                        </a><a class="badd__btn badd__plus" href="#">
                                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5.42409 13.348H8.41561V8.32366H13.454V5.43009H8.41561V0.405792H5.42409V5.43009H0.385742V8.32366H5.42409V13.348Z"
                                                      fill="white"/>
                                            </svg>
                                        </a></div>
                                    <div class="badd__count"><span class="badd__count-val"></span><span
                                                class="badd__count-txt">&nbsp;шт.</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="product__add" type="button" data-price="400"><span class="product__add-txt">Добавить в корзину за&nbsp;</span><span
                                class="product__add-price">400 ₽</span></button>
                </div>
            </div>
        </form>
    <? elseif ($id == 'rolls'):
        ob_start(); ?>
        <form class="product">
            <button class="jsFormClose product__close" type="button">
                <svg width="30" height="30" viewBox="0 0 30 30" xmlns="http://www.w3.org/2000/svg">
                    <path d="M17.7485 14.9999L29.4299 3.31816C30.1901 2.55831 30.1901 1.32974 29.4299 0.569888C28.67 -0.189963 27.4415 -0.189963 26.6816 0.569888L14.9998 12.2516L3.31843 0.569888C2.55822 -0.189963 1.33001 -0.189963 0.570155 0.569888C-0.190052 1.32974 -0.190052 2.55831 0.570155 3.31816L12.2516 14.9999L0.570155 26.6817C-0.190052 27.4415 -0.190052 28.6701 0.570155 29.43C0.948835 29.809 1.44674 29.9994 1.94429 29.9994C2.44184 29.9994 2.93939 29.809 3.31843 29.43L14.9998 17.7482L26.6816 29.43C27.0607 29.809 27.5582 29.9994 28.0558 29.9994C28.5533 29.9994 29.0509 29.809 29.4299 29.43C30.1901 28.6701 30.1901 27.4415 29.4299 26.6817L17.7485 14.9999Z"/>
                </svg>
                <svg width="25" height="14" viewBox="0 0 25 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M23 2L12.5 11L2 2" stroke="#1F1F1F" stroke-width="4"/>
                </svg>
            </button>
            <div class="product__info">
                <div class="prinfo">
                    <button class="prinfo__btn" type="button">i</button>
                    <div class="prinfo__content">
                        <div class="prinfo__title">Пищевая ценность на 100 г</div>
                        <ul class="prinfo__list">
                            <li class="prinfo__item">
                                <div class="prinfo__name">Энерг. ценность</div>
                                <div class="prinfo__val">301,1 ккал</div>
                            </li>
                            <li class="prinfo__item">
                                <div class="prinfo__name">Энерг. ценность</div>
                                <div class="prinfo__val">9,4 г</div>
                            </li>
                            <li class="prinfo__item">
                                <div class="prinfo__name">Жиры</div>
                                <div class="prinfo__val">15,5 г</div>
                            </li>
                            <li class="prinfo__item">
                                <div class="prinfo__name">Углеводы</div>
                                <div class="prinfo__val">28,8 г</div>
                            </li>
                            <li class="prinfo__item">
                                <div class="prinfo__name">Вес</div>
                                <div class="prinfo__val">410 г</div>
                            </li>
                            <li class="prinfo__item">
                                <div class="prinfo__name">Диаметр</div>
                                <div class="prinfo__val">410 г</div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="product__left">
                <div class="product__stick">Новинка</div>
                <div class="product__img"><img class="undefined" src="images/content/catalog/4.jpg" alt="lorem"/>
                </div>
                <div class="product__wrap">
                    <div class="product__wrap-title">Запеченная калифорния</div>
                    <div class="product__wrap-desc">Начинка на выбор, огурец, сыр Филадельфия, икра масага, майонезная
                        шапочка.
                    </div>
                    <div class="product__wrap-char">К данному сету бесплатно прилагаются: имбирь 80гр, васаби 40гр,
                        соевый соус 4 пакетика, 4 прибора.
                    </div>
                </div>
            </div>
            <div class="product__right">
                <div class="product__top">
                    <h3 class="product__title">Запеченная калифорния</h3>
                    <div class="product__char">1050 гр | 28 шт</div>
                    <div class="product__filling prfilling">
                        <div class="prfilling__title">Выберите начинку:</div>
                        <div class="prfilling__list">
                            <label class="prfill">
                                <input class="prfill__input" type="radio" name="productFilling" value="с креветкой"
                                       checked><span class="prfill__fake"><span class="prfill__btn"></span><span
                                            class="prfill__desc"><span>с креветкой</span>&nbsp;-&nbsp;<b>220 ₽</b></span></span>
                            </label>
                            <label class="prfill">
                                <input class="prfill__input" type="radio" name="productFilling" value="с крабом"><span
                                        class="prfill__fake"><span class="prfill__btn"></span><span
                                            class="prfill__desc"><span>с крабом</span>&nbsp;-&nbsp;<b>190 ₽</b></span></span>
                            </label>
                            <label class="prfill">
                                <input class="prfill__input" type="radio" name="productFilling" value="с лососем"><span
                                        class="prfill__fake"><span class="prfill__btn"></span><span
                                            class="prfill__desc"><span>с лососем</span>&nbsp;-&nbsp;<b>200 ₽</b></span></span>
                            </label>
                            <label class="prfill">
                                <input class="prfill__input" type="radio" name="productFilling" value="с окунем"><span
                                        class="prfill__fake"><span class="prfill__btn"></span><span
                                            class="prfill__desc"><span>с окунем</span>&nbsp;-&nbsp;<b>200 ₽</b></span></span>
                            </label>
                        </div>
                    </div>
                    <div class="product__structure">
                        Начинка на выбор, огурец, сыр Филадельфия, икра масага, майонезная шапочка.
                        <br>
                        <br>
                        К данному сету бесплатно прилагаются:
                        имбирь 80гр, васаби 40гр, соевый соус 4 пакетика, 4 прибора.
                    </div>
                </div>
                <div class="product__bottom">
                    <div class="product__slider prslider">
                        <div class="prslider__top">
                            <h3 class="prslider__title">Добавить к заказу</h3>
                            <div class="prslider__nav"><a class="prslider__arr prslider__prev" href="#">
                                    <svg width="34" height="8" viewBox="0 0 34 8" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0.646446 3.64644C0.451183 3.84171 0.451183 4.15829 0.646446 4.35355L3.82843 7.53553C4.02369 7.73079 4.34027 7.73079 4.53553 7.53553C4.7308 7.34027 4.7308 7.02369 4.53553 6.82842L1.70711 4L4.53553 1.17157C4.7308 0.976308 4.7308 0.659726 4.53553 0.464464C4.34027 0.269201 4.02369 0.269201 3.82843 0.464463L0.646446 3.64644ZM34 3.5L1 3.5L1 4.5L34 4.5L34 3.5Z"/>
                                    </svg>
                                </a><a class="prslider__arr prslider__next" href="#">
                                    <svg width="34" height="8" viewBox="0 0 34 8" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M33.3536 4.35355C33.5488 4.15829 33.5488 3.84171 33.3536 3.64645L30.1716 0.464466C29.9763 0.269204 29.6597 0.269204 29.4645 0.464466C29.2692 0.659728 29.2692 0.976311 29.4645 1.17157L32.2929 4L29.4645 6.82843C29.2692 7.02369 29.2692 7.34027 29.4645 7.53553C29.6597 7.7308 29.9763 7.7308 30.1716 7.53553L33.3536 4.35355ZM0 4.5H33V3.5H0V4.5Z"/>
                                    </svg>
                                </a></div>
                        </div>
                        <div class="prslider__bottom"></div>
                        <div class="prslider__container swiper-container">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide badd">
                                    <div class="badd__top"><a class="badd__img" href="/"><img class="undefined"
                                                                                              src="images/content/basket/1.jpg"
                                                                                              alt="lorem"/></a></div>
                                    <div class="badd__bottom"><a class="badd__title" href="/">Палочки для суши</a>
                                        <div class="badd__price">3 ₽</div>
                                    </div>
                                    <div class="badd__btns"><a class="badd__btn badd__minus disabled" href="#">
                                            <svg width="14" height="4" viewBox="0 0 14 4" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path d="M13.8756 3.5797H0.458984V0.217377H13.8756V3.5797Z"
                                                      fill="white"/>
                                            </svg>
                                        </a><a class="badd__btn badd__plus" href="#">
                                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5.42409 13.348H8.41561V8.32366H13.454V5.43009H8.41561V0.405792H5.42409V5.43009H0.385742V8.32366H5.42409V13.348Z"
                                                      fill="white"/>
                                            </svg>
                                        </a></div>
                                    <div class="badd__count"><span class="badd__count-val"></span><span
                                                class="badd__count-txt">&nbsp;шт.</span></div>
                                </div>
                                <div class="swiper-slide badd">
                                    <div class="badd__top"><a class="badd__img" href="/"><img class="undefined"
                                                                                              src="images/content/basket/2.jpg"
                                                                                              alt="lorem"/></a></div>
                                    <div class="badd__bottom"><a class="badd__title" href="/">Имбирь +васаби</a>
                                        <div class="badd__price">30 ₽</div>
                                    </div>
                                    <div class="badd__btns"><a class="badd__btn badd__minus disabled" href="#">
                                            <svg width="14" height="4" viewBox="0 0 14 4" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path d="M13.8756 3.5797H0.458984V0.217377H13.8756V3.5797Z"
                                                      fill="white"/>
                                            </svg>
                                        </a><a class="badd__btn badd__plus" href="#">
                                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5.42409 13.348H8.41561V8.32366H13.454V5.43009H8.41561V0.405792H5.42409V5.43009H0.385742V8.32366H5.42409V13.348Z"
                                                      fill="white"/>
                                            </svg>
                                        </a></div>
                                    <div class="badd__count"><span class="badd__count-val"></span><span
                                                class="badd__count-txt">&nbsp;шт.</span></div>
                                </div>
                                <div class="swiper-slide badd">
                                    <div class="badd__top"><a class="badd__img" href="/"><img class="undefined"
                                                                                              src="images/content/basket/3.jpg"
                                                                                              alt="lorem"/></a></div>
                                    <div class="badd__bottom"><a class="badd__title" href="/">Имбирь</a>
                                        <div class="badd__price">20 ₽</div>
                                    </div>
                                    <div class="badd__btns"><a class="badd__btn badd__minus disabled" href="#">
                                            <svg width="14" height="4" viewBox="0 0 14 4" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path d="M13.8756 3.5797H0.458984V0.217377H13.8756V3.5797Z"
                                                      fill="white"/>
                                            </svg>
                                        </a><a class="badd__btn badd__plus" href="#">
                                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5.42409 13.348H8.41561V8.32366H13.454V5.43009H8.41561V0.405792H5.42409V5.43009H0.385742V8.32366H5.42409V13.348Z"
                                                      fill="white"/>
                                            </svg>
                                        </a></div>
                                    <div class="badd__count"><span class="badd__count-val"></span><span
                                                class="badd__count-txt">&nbsp;шт.</span></div>
                                </div>
                                <div class="swiper-slide badd">
                                    <div class="badd__top"><a class="badd__img" href="/"><img class="undefined"
                                                                                              src="images/content/basket/4.jpg"
                                                                                              alt="lorem"/></a></div>
                                    <div class="badd__bottom"><a class="badd__title" href="/">Васаби</a>
                                        <div class="badd__price">20 ₽</div>
                                    </div>
                                    <div class="badd__btns"><a class="badd__btn badd__minus disabled" href="#">
                                            <svg width="14" height="4" viewBox="0 0 14 4" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path d="M13.8756 3.5797H0.458984V0.217377H13.8756V3.5797Z"
                                                      fill="white"/>
                                            </svg>
                                        </a><a class="badd__btn badd__plus" href="#">
                                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5.42409 13.348H8.41561V8.32366H13.454V5.43009H8.41561V0.405792H5.42409V5.43009H0.385742V8.32366H5.42409V13.348Z"
                                                      fill="white"/>
                                            </svg>
                                        </a></div>
                                    <div class="badd__count"><span class="badd__count-val"></span><span
                                                class="badd__count-txt">&nbsp;шт.</span></div>
                                </div>
                                <div class="swiper-slide badd">
                                    <div class="badd__top"><a class="badd__img" href="/"><img class="undefined"
                                                                                              src="images/content/basket/5.jpg"
                                                                                              alt="lorem"/></a></div>
                                    <div class="badd__bottom"><a class="badd__title" href="/">Соевый соус</a>
                                        <div class="badd__price">20 ₽</div>
                                    </div>
                                    <div class="badd__btns"><a class="badd__btn badd__minus disabled" href="#">
                                            <svg width="14" height="4" viewBox="0 0 14 4" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path d="M13.8756 3.5797H0.458984V0.217377H13.8756V3.5797Z"
                                                      fill="white"/>
                                            </svg>
                                        </a><a class="badd__btn badd__plus" href="#">
                                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5.42409 13.348H8.41561V8.32366H13.454V5.43009H8.41561V0.405792H5.42409V5.43009H0.385742V8.32366H5.42409V13.348Z"
                                                      fill="white"/>
                                            </svg>
                                        </a></div>
                                    <div class="badd__count"><span class="badd__count-val"></span><span
                                                class="badd__count-txt">&nbsp;шт.</span></div>
                                </div>
                                <div class="swiper-slide badd">
                                    <div class="badd__top"><a class="badd__img" href="/"><img class="undefined"
                                                                                              src="images/content/basket/6.jpg"
                                                                                              alt="lorem"/></a></div>
                                    <div class="badd__bottom"><a class="badd__title" href="/">Палочки для суши</a>
                                        <div class="badd__price">3 ₽</div>
                                    </div>
                                    <div class="badd__btns"><a class="badd__btn badd__minus disabled" href="#">
                                            <svg width="14" height="4" viewBox="0 0 14 4" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path d="M13.8756 3.5797H0.458984V0.217377H13.8756V3.5797Z"
                                                      fill="white"/>
                                            </svg>
                                        </a><a class="badd__btn badd__plus" href="#">
                                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5.42409 13.348H8.41561V8.32366H13.454V5.43009H8.41561V0.405792H5.42409V5.43009H0.385742V8.32366H5.42409V13.348Z"
                                                      fill="white"/>
                                            </svg>
                                        </a></div>
                                    <div class="badd__count"><span class="badd__count-val"></span><span
                                                class="badd__count-txt">&nbsp;шт.</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="product__add" type="button" data-price="400"><span class="product__add-txt">Добавить в корзину за&nbsp;</span><span
                                class="product__add-price">400 ₽</span></button>
                </div>
            </div>
        </form>
    <?endif;
    $html = ob_get_contents();
    ob_end_clean();
    return $html;
}

function getAction()
{

    ob_start(); ?>
    <div class="acpopup">
        <button class="jsFormClose acpopup__close" type="button">
            <svg width="30" height="30" viewBox="0 0 30 30" xmlns="http://www.w3.org/2000/svg">
                <path d="M17.7485 14.9999L29.4299 3.31816C30.1901 2.55831 30.1901 1.32974 29.4299 0.569888C28.67 -0.189963 27.4415 -0.189963 26.6816 0.569888L14.9998 12.2516L3.31843 0.569888C2.55822 -0.189963 1.33001 -0.189963 0.570155 0.569888C-0.190052 1.32974 -0.190052 2.55831 0.570155 3.31816L12.2516 14.9999L0.570155 26.6817C-0.190052 27.4415 -0.190052 28.6701 0.570155 29.43C0.948835 29.809 1.44674 29.9994 1.94429 29.9994C2.44184 29.9994 2.93939 29.809 3.31843 29.43L14.9998 17.7482L26.6816 29.43C27.0607 29.809 27.5582 29.9994 28.0558 29.9994C28.5533 29.9994 29.0509 29.809 29.4299 29.43C30.1901 28.6701 30.1901 27.4415 29.4299 26.6817L17.7485 14.9999Z"/>
            </svg>
        </button>
        <div class="acpopup__stick">Акция</div>
        <h3 class="acpopup__title">Именинник</h3>
        <div class="acpopup__note"><i>*</i>&nbsp;подарок зависит от суммы заказа</div>
        <div class="acpopup__content content">
            <p>В честь вашего дня рождения добавляется подарок к заказу:</p>
            <ul>
                <li>от 399р - запечённый/ горячий ролл с курочкой или крабом;</li>
                <li>от 699р - запечённый/ горячий ролл с лососем;</li>
                <li>от 999р - пиццу "Копчёную" или "Пан-Чикен"!</li>
            </ul>
            <p>Для участия нужно&nbsp;<a href="/account.html">зарегистрироваться&nbsp;</a>и в личном кабинете ввести
                дату рождения.</p>
        </div>
        <div class="acpopup__smalls">
            <div class="acpopup__small"><i>*&nbsp;</i>Акции, скидки и промокоды НЕ СУММИРУЮТСЯ! В одном заказе может
                быть только один акционный товар.
            </div>
            <div class="acpopup__small"><i>*&nbsp;</i>Акции, скидки и промокоды НЕ СУММИРУЮТСЯ! В одном заказе может
                быть только один акционный товар.
            </div>
        </div>
    </div>
    <? $html = ob_get_contents();
    ob_end_clean();
    return $html;
}

function getEditAddrs()
{
    ob_start(); ?>
    <form class="pmaddrs">
        <h3 class="pmap__title pmaddrs__title">Мои адреса</h3>
        <div class="pmaddrs__list">
            <div class="pmaddrs__addr pmaddr">
                <label class="pmaddr__label"><span class="pmaddr__edit"><svg width="21" height="20"
                                                                             viewBox="0 0 21 20" fill="none"
                                                                             xmlns="http://www.w3.org/2000/svg">
<path d="M17.4088 9.9999C17.0143 9.9999 16.6945 10.3197 16.6945 10.7142V17.8569C16.6945 18.2514 16.3747 18.5712 15.9802 18.5712H3.1233C2.7288 18.5712 2.40901 18.2514 2.40901 17.8569V3.57142C2.40901 3.17692 2.7288 2.85713 3.1233 2.85713H11.6946C12.0891 2.85713 12.4089 2.53734 12.4089 2.14284C12.4089 1.74834 12.0891 1.42859 11.6946 1.42859H3.1233C1.93985 1.42859 0.980469 2.38797 0.980469 3.57142V17.8569C0.980469 19.0404 1.93985 19.9998 3.1233 19.9998H15.9803C17.1637 19.9998 18.1231 19.0404 18.1231 17.8569V10.7142C18.1231 10.3197 17.8033 9.9999 17.4088 9.9999Z"
      fill="#FF4A00"/>
<path d="M20.1799 0.800977C19.6671 0.288038 18.9714 -7.24037e-05 18.2461 1.13005e-05C17.5203 -0.00208131 16.824 0.286531 16.3126 0.801438L6.90408 10.2091C6.82603 10.2878 6.76714 10.3834 6.73195 10.4884L5.30341 14.7741C5.17873 15.1483 5.38108 15.5528 5.75537 15.6774C5.82798 15.7016 5.90403 15.714 5.98053 15.7141C6.0572 15.7139 6.13342 15.7016 6.20624 15.6777L10.4919 14.2491C10.5972 14.214 10.6928 14.1548 10.7712 14.0763L20.1796 4.66782C21.2475 3.60009 21.2476 1.86883 20.1799 0.800977ZM19.1697 3.65851L9.88404 12.9441L7.10979 13.8705L8.03334 11.0998L17.3225 1.81426C17.8332 1.30458 18.6604 1.30542 19.1701 1.8161C19.4135 2.06006 19.5507 2.39031 19.5518 2.73496C19.5526 3.08146 19.4151 3.41393 19.1697 3.65851Z"
      fill="#FF4A00"/>
</svg></span>
                    <input class="pmaddr__input" type="radio" name="pmaddr" checked value="1"><span
                            class="pmaddr__fake"><span class="pmaddr__round"></span><span
                                class="pmaddr__title">г. Нефтекамск, ул. Петровско-Разумовская</span></span>
                </label>
                <button class="pmaddr__del" type="button">
                    <svg width="20" height="19" viewBox="0 0 20 19" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12.2212 9.50014L19.6194 2.10154C20.1008 1.6203 20.1008 0.842184 19.6194 0.360936C19.1381 -0.120312 18.36 -0.120312 17.8788 0.360936L10.4804 7.75953L3.08214 0.360936C2.60067 -0.120312 1.8228 -0.120312 1.34157 0.360936C0.860103 0.842184 0.860103 1.6203 1.34157 2.10154L8.73978 9.50014L1.34157 16.8987C0.860103 17.38 0.860103 18.1581 1.34157 18.6393C1.5814 18.8794 1.89674 19 2.21185 19C2.52697 19 2.84208 18.8794 3.08214 18.6393L10.4804 11.2407L17.8788 18.6393C18.1189 18.8794 18.434 19 18.7491 19C19.0642 19 19.3793 18.8794 19.6194 18.6393C20.1008 18.1581 20.1008 17.38 19.6194 16.8987L12.2212 9.50014Z"/>
                    </svg>
                    Удалить
                </button>
            </div>
            <div class="pmaddrs__addr pmaddr">
                <label class="pmaddr__label"><span class="pmaddr__edit"><svg width="21" height="20"
                                                                             viewBox="0 0 21 20" fill="none"
                                                                             xmlns="http://www.w3.org/2000/svg">
<path d="M17.4088 9.9999C17.0143 9.9999 16.6945 10.3197 16.6945 10.7142V17.8569C16.6945 18.2514 16.3747 18.5712 15.9802 18.5712H3.1233C2.7288 18.5712 2.40901 18.2514 2.40901 17.8569V3.57142C2.40901 3.17692 2.7288 2.85713 3.1233 2.85713H11.6946C12.0891 2.85713 12.4089 2.53734 12.4089 2.14284C12.4089 1.74834 12.0891 1.42859 11.6946 1.42859H3.1233C1.93985 1.42859 0.980469 2.38797 0.980469 3.57142V17.8569C0.980469 19.0404 1.93985 19.9998 3.1233 19.9998H15.9803C17.1637 19.9998 18.1231 19.0404 18.1231 17.8569V10.7142C18.1231 10.3197 17.8033 9.9999 17.4088 9.9999Z"
      fill="#FF4A00"/>
<path d="M20.1799 0.800977C19.6671 0.288038 18.9714 -7.24037e-05 18.2461 1.13005e-05C17.5203 -0.00208131 16.824 0.286531 16.3126 0.801438L6.90408 10.2091C6.82603 10.2878 6.76714 10.3834 6.73195 10.4884L5.30341 14.7741C5.17873 15.1483 5.38108 15.5528 5.75537 15.6774C5.82798 15.7016 5.90403 15.714 5.98053 15.7141C6.0572 15.7139 6.13342 15.7016 6.20624 15.6777L10.4919 14.2491C10.5972 14.214 10.6928 14.1548 10.7712 14.0763L20.1796 4.66782C21.2475 3.60009 21.2476 1.86883 20.1799 0.800977ZM19.1697 3.65851L9.88404 12.9441L7.10979 13.8705L8.03334 11.0998L17.3225 1.81426C17.8332 1.30458 18.6604 1.30542 19.1701 1.8161C19.4135 2.06006 19.5507 2.39031 19.5518 2.73496C19.5526 3.08146 19.4151 3.41393 19.1697 3.65851Z"
      fill="#FF4A00"/>
</svg></span>
                    <input class="pmaddr__input" type="radio" name="pmaddr" value="2"><span
                            class="pmaddr__fake"><span class="pmaddr__round"></span><span
                                class="pmaddr__title">г. Москва, ул. 1</span></span>
                </label>
                <button class="pmaddr__del" type="button">
                    <svg width="20" height="19" viewBox="0 0 20 19" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12.2212 9.50014L19.6194 2.10154C20.1008 1.6203 20.1008 0.842184 19.6194 0.360936C19.1381 -0.120312 18.36 -0.120312 17.8788 0.360936L10.4804 7.75953L3.08214 0.360936C2.60067 -0.120312 1.8228 -0.120312 1.34157 0.360936C0.860103 0.842184 0.860103 1.6203 1.34157 2.10154L8.73978 9.50014L1.34157 16.8987C0.860103 17.38 0.860103 18.1581 1.34157 18.6393C1.5814 18.8794 1.89674 19 2.21185 19C2.52697 19 2.84208 18.8794 3.08214 18.6393L10.4804 11.2407L17.8788 18.6393C18.1189 18.8794 18.434 19 18.7491 19C19.0642 19 19.3793 18.8794 19.6194 18.6393C20.1008 18.1581 20.1008 17.38 19.6194 16.8987L12.2212 9.50014Z"/>
                    </svg>
                    Удалить
                </button>
            </div>
        </div>
        <div class="pmaddrs__btns">
            <button class="pmaddrs__add btn" type="button">
                <svg width="12" height="11" viewBox="0 0 12 11" xmlns="http://www.w3.org/2000/svg">
                    <path d="M5.20479 10.8749H7.72457V6.65312H11.9684V4.22175H7.72457V0H5.20479V4.22175H0.960938V6.65312H5.20479V10.8749Z"/>
                </svg>
                Добавить еще
            </button>
            <button class="pmaddrs__submit btn3" type="submit">Сохранить</button>
        </div>
    </form>
    <? $html = ob_get_contents();
    ob_end_clean();
    return $html;
}

function getSearchAddrs()
{
    ob_start(); ?>
    <div class="pmsearch">
        <h3 class="pmap__title pmsearch__title">Укажите адрес доставки</h3>
        <div class="pmsearch__controls">
            <div class="pmsearch__addr">
                <input class="input input" type="text" placeholder="Введите адрес" id="suggest">
                <input type="hidden" name="searchAddr" value="">
                <button class="pmsearch__clear" type="button"><svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12.2212 9.50014L19.6194 2.10154C20.1008 1.6203 20.1008 0.842184 19.6194 0.360936C19.1381 -0.120312 18.36 -0.120312 17.8788 0.360936L10.4804 7.75953L3.08214 0.360936C2.60067 -0.120312 1.8228 -0.120312 1.34157 0.360936C0.860103 0.842184 0.860103 1.6203 1.34157 2.10154L8.73978 9.50014L1.34157 16.8987C0.860103 17.38 0.860103 18.1581 1.34157 18.6393C1.5814 18.8794 1.89674 19 2.21185 19C2.52697 19 2.84208 18.8794 3.08214 18.6393L10.4804 11.2407L17.8788 18.6393C18.1189 18.8794 18.434 19 18.7491 19C19.0642 19 19.3793 18.8794 19.6194 18.6393C20.1008 18.1581 20.1008 17.38 19.6194 16.8987L12.2212 9.50014Z" fill="white"/>
                    </svg>
                </button>
                <div class="pmsearch__error" id="notice">Адрес не найден</div>
            </div>
            <button class="pmsearch__submit btn3" type="button">ОК</button>
        </div>
        <div class="pmsearch__map"><img src="https://api-maps.yandex.ru/services/constructor/1.0/static/?um=constructor%3Aca411b09bd444fa6c669b434370daa167d15e40c80e93b3fc498740d3439a9f3&amp;width=600&amp;height=290&amp;lang=ru_RU" alt="" style="border: 0;" />
            <div id="pmap"></div>
        </div>
    </div>
    <? $html = ob_get_contents();
    ob_end_clean();
    return $html;
}

function getEditAddr()
{
    ob_start(); ?>
    <div class="pmsearch">
        <h3 class="pmap__title pmsearch__title">Укажите адрес доставки</h3>
        <div class="pmsearch__controls">
            <div class="pmsearch__addr active">
                <input class="input input" type="text" placeholder="Введите адрес" id="suggest" value="Россия, Москва, улица Нижние Поля, 31">
                <input type="hidden" name="searchAddr" value="Россия, Москва, улица Нижние Поля, 31">
                <button class="pmsearch__clear" type="button"><svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12.2212 9.50014L19.6194 2.10154C20.1008 1.6203 20.1008 0.842184 19.6194 0.360936C19.1381 -0.120312 18.36 -0.120312 17.8788 0.360936L10.4804 7.75953L3.08214 0.360936C2.60067 -0.120312 1.8228 -0.120312 1.34157 0.360936C0.860103 0.842184 0.860103 1.6203 1.34157 2.10154L8.73978 9.50014L1.34157 16.8987C0.860103 17.38 0.860103 18.1581 1.34157 18.6393C1.5814 18.8794 1.89674 19 2.21185 19C2.52697 19 2.84208 18.8794 3.08214 18.6393L10.4804 11.2407L17.8788 18.6393C18.1189 18.8794 18.434 19 18.7491 19C19.0642 19 19.3793 18.8794 19.6194 18.6393C20.1008 18.1581 20.1008 17.38 19.6194 16.8987L12.2212 9.50014Z" fill="white"/>
                    </svg>
                </button>
                <div class="pmsearch__error" id="notice">Адрес не найден</div>
            </div>
            <button class="pmsearch__submit btn3" type="button">ОК</button>
        </div>
        <div class="pmsearch__map"><img src="https://api-maps.yandex.ru/services/constructor/1.0/static/?um=constructor%3Aca411b09bd444fa6c669b434370daa167d15e40c80e93b3fc498740d3439a9f3&amp;width=600&amp;height=290&amp;lang=ru_RU" alt="" style="border: 0;" />
            <div id="pmap"></div>
        </div>
    </div>
    <? $html = ob_get_contents();
    ob_end_clean();
    return $html;
}
