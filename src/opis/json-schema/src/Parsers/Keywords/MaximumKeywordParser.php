<?php
/* ============================================================================
 * Copyright 2020 Zindex Software
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *    http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 * ============================================================================ */

namespace Opis\JsonSchema\Parsers\Keywords;

use Opis\JsonSchema\Keyword;
use Opis\JsonSchema\Info\SchemaInfo;
use Opis\JsonSchema\Parsers\{KeywordParser, DataKeywordTrait,
    SchemaParser};
use Opis\JsonSchema\Keywords\{
    ExclusiveMaximumDataKeyword,
    ExclusiveMaximumKeyword,
    MaximumDataKeyword,
    MaximumKeyword
};

class MaximumKeywordParser extends KeywordParser
{
    use DataKeywordTrait;

    /**
     * @var string|null
     */
    protected $exclusiveKeyword;

    /**
     * @param string $keyword
     * @param string|null $exclusiveKeyword
     */
    public function __construct(string $keyword, $exclusiveKeyword = null)
    {
        parent::__construct($keyword);
        $this->exclusiveKeyword = $exclusiveKeyword;
    }

    /**
     * @inheritDoc
     */
    public function type(): string
    {
        return self::TYPE_NUMBER;
    }

    /**
     * @inheritDoc
     * @param \Opis\JsonSchema\Info\SchemaInfo $info
     * @param \Opis\JsonSchema\Parsers\SchemaParser $parser
     * @param object $shared
     */
    public function parse($info, $parser, $shared)
    {
        $schema = $info->data();

        if (!$this->keywordExists($schema)) {
            return null;
        }

        $value = $this->keywordValue($schema);

        $exclusive = false;
        if ($parser->option('allowExclusiveMinMaxAsBool') &&
            $this->exclusiveKeyword !== null &&
            property_exists($schema, $this->exclusiveKeyword)) {
            $exclusive = $schema->{$this->exclusiveKeyword} === true;
        }

        if ($this->isDataKeywordAllowed($parser, $this->keyword)) {
            if ($pointer = $this->getDataKeywordPointer($value)) {
                return $exclusive
                    ? new ExclusiveMaximumDataKeyword($pointer)
                    : new MaximumDataKeyword($pointer);
            }
        }

        if (!is_int($value) && !is_float($value) || is_nan($value) || !is_finite($value)) {
            throw $this->keywordException('{keyword} must contain a valid number', $info);
        }

        return $exclusive
            ? new ExclusiveMaximumKeyword($value)
            : new MaximumKeyword($value);
    }
}