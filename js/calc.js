$(document).ready(function() {
    if($('.calc-order').length){
        appCalcOrder.init();
    }
});

var appCalcOrder = {
    vars: {
        iV: 0,
        iSum: 0,
        iValue: 0,
        iArea: 0,
        iWidth: 0,
        iPrice: 0,
        sName: ''
    },
    el: {
        sSelect: '.calc-order input, .calc-order select',
        rSelect: null,
        sResult: '.calc-order .sum span',
        rResult: null,
        sSale: '.calc-order .sale',
        rSale: null,
        sArea: '.calc-order input[name="area"]',
        sWidth: '.calc-order input[name="width"]',
    },
    init: function() {
        appCalcOrder.calcParam();
        appCalcOrder.calcReady();
        appCalcOrder.calcChange();
    },
    calcParam: function() {
        appCalcOrder.el.rSelect = $(appCalcOrder.el.sSelect);
        appCalcOrder.el.rResult = $(appCalcOrder.el.sResult);
        appCalcOrder.el.rSale = $(appCalcOrder.el.sSale);
    },
    calcReady: function() {
        appCalcOrder.calcStart();
    },
    calcChange: function() {
        appCalcOrder.el.rSelect.change(function() {
            appCalcOrder.calcStart();
        });
    },
    calcStart: function() {
        appCalcOrder.vars.iArea = parseFloat($(appCalcOrder.el.sArea).val());
        appCalcOrder.vars.iWidth = parseFloat($(appCalcOrder.el.sWidth).val());
        appCalcOrder.calcWidthDefault();
        // Сумма
        appCalcOrder.vars.iSum = 0;
        // Проходим поля формы
        appCalcOrder.el.rSelect.each(function() {
            appCalcOrder.calcCalculation($(this));
        });
        // Печатаем сумму-результат
        appCalcOrder.calcPrint();
    },
    calcWidthDefault: function() {
        if (isNaN(appCalcOrder.vars.iWidth)) {
            appCalcOrder.vars.iWidth = 0;
        }
    },
    calcPrint: function() {
        if (isNaN(appCalcOrder.vars.iSum)) {
            appCalcOrder.vars.iSum = 0;
        }
        // Печать результата
        appCalcOrder.el.rResult.text(
            appCalcOrder.vars.iSum.toFixed(2)
            );
    },
    calcValueNan: function() {
        if (isNaN(appCalcOrder.vars.iValue) || !appCalcOrder.vars.iValue || appCalcOrder.vars.iValue == '') {
            appCalcOrder.vars.iValue = 0;
        }
    },
    calcCalculation: function(rThis) {
        // Имя текущего поля
        appCalcOrder.vars.sName = rThis.attr('name');
        // Значение текущего поля
        appCalcOrder.vars.iValue = parseFloat(rThis.val());
        // Значение текущего поля
        appCalcOrder.vars.iPrice = parseFloat(rThis.data('calc-price'));
        //
        appCalcOrder.calcValueNan();
        // 
        appCalcOrder.calcArea('area');
        // Расчёт на основе ширины
        //appCalcOrder.calcArea( 'width' );
        // Расчёт на основе материала
        appCalcOrder.calcMaterial('cover', rThis);
        // Количество углов
        appCalcOrder.calcValQt('corners', 4);
        // Кол-во труб
        appCalcOrder.calcVal('pipes');
        // Кол-во точечных светильников
        appCalcOrder.calcVal('spotlights');
        // Кол-во потолочных люстр
        appCalcOrder.calcVal('luster');
        // Длина карниза
        appCalcOrder.calcVal('cornice');
        // Монтаж багетной вставки
        appCalcOrder.calcVal('baget-vstavka');
        // Криволинейный участок (удалить)
        appCalcOrder.calcVal('krivoy-uchastok');
        // Переход в другой уровень
        appCalcOrder.calcVal('new-level');

        // Высота потолков больше 3м
        appCalcOrder.calcValCheck('ceiling-height', rThis.is(':checked'));
    },
    calcVal: function(sName) {
        if (appCalcOrder.vars.sName == sName && appCalcOrder.vars.iValue > 0) {
            appCalcOrder.vars.iSum += parseFloat((appCalcOrder.vars.iPrice * appCalcOrder.vars.iValue));
            appCalcOrder.calcLog('calcVal: ' + sName + ' ' + appCalcOrder.vars.iSum);
        }
    },
    calcValCheck: function(sName, rCheck) {
        if (rCheck) {
            appCalcOrder.vars.iPrice = appCalcOrder.vars.iSum;
            appCalcOrder.calcVal(sName);
            appCalcOrder.calcLog('calcValCheck: ' + sName + ' ' + appCalcOrder.vars.iSum);
        }
    },
    calcValQt: function(sName, iQt) {
        if (appCalcOrder.vars.sName == sName && appCalcOrder.vars.iValue > iQt) {
            appCalcOrder.vars.iSum += parseFloat(appCalcOrder.vars.iPrice * (appCalcOrder.vars.iValue - iQt));
            appCalcOrder.calcLog('calcValQt: ' + sName + ' ' + appCalcOrder.vars.iSum);
        }
    },
    calcMaterial: function(sName, rThis) {
        if (appCalcOrder.vars.sName == sName) {
            var iPrice = appCalcOrder.calcMaterialAttr( rThis );
            console.log(iPrice);
            // Самое важное: стоимость в зависимости от материала и ширины комнаты
            appCalcOrder.vars.iSum += parseFloat((iPrice * appCalcOrder.vars.iArea));
            appCalcOrder.calcLog('calcMaterial: ' + sName + ' ' + appCalcOrder.vars.iSum);
        }
    },
    calcMaterialAttr: function(rThis) {
        return appCalcOrder.calcReadAttr($.trim(rThis.val()));
    },
    calcReadAttr: function(sStr) {
        var iRes = sStr;
        var iOk = false;
        try {
            var aStrTmp = sStr.split('|');
            $.trim(aStrTmp[0]).split(',').forEach(function(iElem) {
                // Диапазон aTmp[0]
                // Цена aTmp[1]
                var aTmp = iElem.split('=');
                var aWdh = aTmp[0].split(':');
                // Проверяем вхождение в диапазон
                var iW = appCalcOrder.vars.iWidth * 100;
                if (iW >= aWdh[0] && iW <= aWdh[1]) {
                    // Есть вхождение
                    iRes = $.trim(aTmp[1]);
                    iOk = true;
                }
            });
            // Цена вне диапазона
            if (!iOk && aStrTmp[1]) {
                iRes = aStrTmp[1];
            }
        } catch (e) {
            console.log(e);
        }
        return parseFloat(iRes);
    },
    calcArea: function(sName) {
        //
        appCalcOrder.vars.iV = parseFloat(appCalcOrder.vars.iValue);
        //
        if (appCalcOrder.vars.sName == sName) {
            // Больше 0 и меньше 5 (+1000 к стоимости)
            appCalcOrder.calcAreaSet(0, 5, 1000);
            // Больше, равно 5 и меньше 7 (+800 к стоимости)
            appCalcOrder.calcAreaSet(5, 8, 800);
            // Больше, равно 8 и меньше 10 (+500 к стоимости)
            appCalcOrder.calcAreaSet(8, 10, 500);
            // Блок индивидуальной скидки
            appCalcOrder.calcAreaIndividual();
            //
            appCalcOrder.calcLog('calcArea: ' + appCalcOrder.vars.iSum);
        }
    },
    calcAreaSet: function(iMin, iMax, iSum) {
        if (appCalcOrder.vars.iV > 0 && appCalcOrder.vars.iV >= iMin && appCalcOrder.vars.iV < iMax) {
            appCalcOrder.vars.iSum += parseFloat(iSum);
        }
    },
    calcAreaIndividual: function() {
        // Скидка
        if (appCalcOrder.vars.iV >= 50) {
            appCalcOrder.el.rSale.show();
        } else {
            appCalcOrder.el.rSale.hide();
        }
    },
    calcLog: function(vLog) {
        console.log( vLog );
    }
};