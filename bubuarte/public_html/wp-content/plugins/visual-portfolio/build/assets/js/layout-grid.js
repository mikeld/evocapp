(()=>{"use strict";var t={n:i=>{var o=i&&i.__esModule?()=>i.default:()=>i;return t.d(o,{a:o}),o},d:(i,o)=>{for(var e in o)t.o(o,e)&&!t.o(i,e)&&Object.defineProperty(i,e,{enumerable:!0,get:o[e]})},o:(t,i)=>Object.prototype.hasOwnProperty.call(t,i)};const i=window.jQuery;var o=t.n(i);const{screenSizes:e}=window.VPData;if(void 0!==window.Isotope&&void 0!==window.Isotope.LayoutMode){const t=window.Isotope.LayoutMode.create("vpRows").prototype;t.measureColumns=function(){if(this.items=this.isotope.filteredItems,this.getContainerWidth(),!this.columnWidth){const t=this.items[0],i=t&&t.element;this.columnWidth=i&&window.getSize(i).outerWidth||this.containerWidth}this.columnWidth+=this.gutter;const t=this.containerWidth+this.gutter;let i=t/this.columnWidth;const o=this.columnWidth-t%this.columnWidth;i=Math[o&&o<1?"round":"floor"](i),this.cols=Math.max(i,1)},t.getContainerWidth=function(){const t=this._getOption&&this._getOption("fitWidth")?this.element.parentNode:this.element,i=window.getSize(t);this.containerWidth=i&&i.innerWidth},t._resetLayout=function(){this.x=0,this.y=0,this.maxY=0,this.horizontalColIndex=0,this._getMeasurement("columnWidth","outerWidth"),this._getMeasurement("gutter","outerWidth"),this.measureColumns()},t._getItemLayoutPosition=function(t){t.getSize();const i=t.size.outerWidth%this.columnWidth;let o=Math[i&&i<1?"round":"ceil"](t.size.outerWidth/this.columnWidth);o=Math.min(o,this.cols);let e=this.horizontalColIndex%this.cols;e=o>1&&e+o>this.cols?0:e;const s=t.size.outerWidth&&t.size.outerHeight;this.horizontalColIndex=s?e+o:this.horizontalColIndex;const n=t.size.outerWidth+this.gutter;0!==this.x&&1===this.horizontalColIndex&&(this.x=0,this.y=this.maxY);const h={x:this.x,y:this.y};return this.maxY=Math.max(this.maxY,this.y+t.size.outerHeight),this.x+=n,h},t._getContainerSize=function(){return{height:this.maxY}}}o()(document).on("initOptions.vpf",((t,i)=>{"vpf"===t.namespace&&(i.defaults.gridColumns=3,i.options.gridColumns||(i.options.gridColumns=i.defaults.gridColumns),i.options.gridImagesAspectRatio||(i.options.gridImagesAspectRatio=i.defaults.gridImagesAspectRatio))})),o()(document).on("initLayout.vpf",((t,i)=>{if("vpf"!==t.namespace)return;if("grid"!==i.options.layout)return;i.addStyle(".vp-portfolio__item-wrap",{width:100/i.options.gridColumns+"%"});let o=i.options.gridColumns-1,s=Math.min(e.length-1,o);for(;s>=0;s-=1)o>0&&void 0!==e[s]&&i.addStyle(".vp-portfolio__item-wrap",{width:100/o+"%"},`screen and (max-width: ${e[s]}px)`),o-=1})),o()(document).on("beforeInitIsotope.vpf",((t,i,o)=>{"vpf"===t.namespace&&"grid"===i.options.layout&&"object"==typeof o&&(o.layoutMode="vpRows")}))})();