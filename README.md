# u-editor
百度编辑器,composer eayswoole版本.  

## 使用方法
新增一个控制器,继承`EasySwoole\UEditor\UEditorController`.
```php
<?php
namespace App\HttpController;
use EasySwoole\Http\AbstractInterface\Controller;
use EasySwoole\UEditor\UEditorController;

class UEditor extends UEditorController
{

}
```
百度编辑器前端js请求路径修改为此编辑器地址.  

即可直接使用.  

## 自定义使用方法.
在`EasySwoole\UEditor\UEditorController`控制器中,有着默认的实现方法,如果你需要修改配置,可通过重写控制器方法进行修改.
