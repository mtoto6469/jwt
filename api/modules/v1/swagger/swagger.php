<?php
namespace api\modules\v1\swagger;

/**
 * @SWG\Swagger(
 *     schemes={"http"},
 *     host="localhost",
 *     basePath="/api/v1",
 *     @SWG\Info(
 *         version="1",
 *         title="یادداشت های اجرای",
 *         description="Version: __1__",
 *         @SWG\Contact(name = "miriam", email = "licq@lxpgw.com")
 *     ),
 * )
 *
 * @SWG\Tag(
 *   name="user",
 *   description="user-related operations",
 *   @SWG\ExternalDocumentation(
 *     description="Find out more about our store",
 *     url="http://swagger.io"
 *   )
 * )
 */

/**
 * @SWG\Definition(
 *   @SWG\Xml(name="##default")
 * )
 */
class ApiResponse
{
    /**
     * @SWG\Property(format="int32", description = "code of result")
     * @var int
     */
    public $code;
    /**
     * @SWG\Property
     * @var string
     */
    public $type;
    /**
     * @SWG\Property
     * @var string
     */
    public $message;
    /**
     * @SWG\Property(format = "int64", enum = {1, 2})
     * @var integer
     */
    public $status;
}