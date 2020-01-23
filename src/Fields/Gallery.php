<?php

/*
 * This file is part of WordPlate.
 *
 * (c) Vincent Klaiber <hello@doubledip.se>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace WordPlate\Acf\Fields;

use InvalidArgumentException;
use WordPlate\Acf\Fields\Attributes\ConditionalLogic;
use WordPlate\Acf\Fields\Attributes\Dimensions;
use WordPlate\Acf\Fields\Attributes\FileSize;
use WordPlate\Acf\Fields\Attributes\Instructions;
use WordPlate\Acf\Fields\Attributes\Library;
use WordPlate\Acf\Fields\Attributes\MimeTypes;
use WordPlate\Acf\Fields\Attributes\MinMax;
use WordPlate\Acf\Fields\Attributes\Required;
use WordPlate\Acf\Fields\Attributes\ReturnFormat;
use WordPlate\Acf\Fields\Attributes\Wrapper;

class Gallery extends Field
{
    use ConditionalLogic;
    use Dimensions;
    use FileSize;
    use Instructions;
    use Library;
    use MimeTypes;
    use MinMax;
    use Required;
    use ReturnFormat;
    use Wrapper;

    /**
     * The field type.
     *
     * @var string
     */
    protected $type = 'gallery';

    /**
     * Set the insert behaviour.
     *
     * @param string $insert
     *
     * @return self
     */
    public function insert(string $insert): self
    {
        if (!in_array($insert, ['append', 'prepend'])) {
            throw new InvalidArgumentException("Invalid argument insert [$insert]");
        }

        $this->config->set('insert', $insert);

        return $this;
    }
}
