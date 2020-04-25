<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>图片上传预览</title>
    <style type='text/css'>
        body{
            margin: 0
        }
        .content{
            padding:0.5rem;
            display: flex;
            align-items: center;
            /*border-bottom: 1px #999 solid*/
        }
        .label{
            /*width:5rem;*/
            text-align: center; 
        }
        .img-area{
            flex:1
        }
        .container{
            background-color:#e7e7e7;
            position: relative;
        }
        .container div{
            text-align: center;     /*子元素居中对齐*/
            padding:0.5rem 0;
        }
        .container input{
            opacity:0;                      /* 设置透明度，取值： 0-1；用在支持CSS3 opacity 的浏览器中 */
            filter:alpha(opacity=100);      /* 设置透明度，取值： 0-100；filter属性是IE特有的，兼容IE8及以下的IE浏览器 */
            height: 100%;           /* 填充满这一层的所有宽高 */
            width: 100%;
            position: absolute;     /* 生成绝对定位的元素，相对于 static 定位以外的第一个父元素进行定位 */
            top: 0;
            left: 0;
            z-index: 9;             /* z轴，取值可以是负数、0 或 无群大，两个元素的  z-index属性比较，数值大的元素显示在上方 */
        }
        .container p{
            font-size: 0.9rem;
            color:#999;
        }
        .btn{
            background-color: #4363ab;
            color: #fff;
            text-align: center;
            padding: 0.5rem 1rem;
            width:80%;
            border-radius: 0.2rem;
            margin: 2rem auto;
            font-weight: 600;
            font-size: 1.2rem;
        }
        .btn1{
            text-align: center;
        }
    </style>
</head>
<body>

<!-- <div class="label">身份证</div> -->
<div class="content">
    <div class="img-area">
        <div class="container">
            <input type="file" id='id-face' name='face'  accept="image/*" />
            <div id='face-empty-result'>
                <img style='width:4rem' src="https://github.com/wangheng3751/my-resources/blob/master/images/camera.png?raw=true" alt="">
                <p>身份证正面照</p>
            </div>
            <img style='width: 100%' id='face-result'/>
        </div>
        <div class="container" style='margin-top:0.5rem;'>
            <input type="file" id='id-back' name='back' accept="image/*" />
            <div id='back-empty-result'>
                <img style='width:4rem' src="https://github.com/wangheng3751/my-resources/blob/master/images/camera.png?raw=true" alt="">
                <p>身份证反面照</p>
            </div>
            <img style='width: 100%' id='back-result'/>
        </div>
    </div>
</div>
<div class="btn1"><div class="btn">提交</div></div>

<script type='text/javascript'>
    console.log(2222);
</script>

</body>
</html>