<?php 
/**
	Admin Page Framework v3.8.34 by Michael Uno 
	Generated by PHP Class Files Script Generator <https://github.com/michaeluno/PHP-Class-Files-Script-Generator>
	<http://en.michaeluno.jp/DLDC>
	Copyright (c) 2013-2021, Michael Uno; Licensed under MIT <http://opensource.org/licenses/MIT> */
class AdminPageFramework_Debug_Base extends AdminPageFramework_FrameworkUtility {
    static public $iLegibleArrayDepthLimit = 50;
    static public $iLegibleStringCharacterLimit = 99999;
    static protected function _getLegibleDetails($mValue, $iStringLengthLimit = 0, $iArrayDepthLimit = 0) {
        if (is_array($mValue)) {
            return '(array, length: ' . count($mValue) . ') ' . print_r(self::___getLegibleDetailedArray($mValue, $iStringLengthLimit, $iArrayDepthLimit), true);
        }
        return print_r(self::getLegibleDetailedValue($mValue, $iStringLengthLimit), true);
    }
    static public function getObjectName($mItem) {
        if (is_object($mItem)) {
            return '(object) ' . get_class($mItem);
        }
        return $mItem;
    }
    static protected function _getLegible($mValue, $iStringLengthLimit = 0, $iArrayDepthLimit = 0) {
        $iArrayDepthLimit = $iArrayDepthLimit ? $iArrayDepthLimit : self::$iLegibleArrayDepthLimit;
        $mValue = is_object($mValue) ? (method_exists($mValue, '__toString') ? ( string )$mValue : ( array )$mValue) : $mValue;
        $mValue = is_array($mValue) ? self::getArrayMappedRecursive(array(__CLASS__, 'getObjectName'), self::_getSlicedByDepth($mValue, $iArrayDepthLimit), array()) : $mValue;
        $mValue = is_string($mValue) ? self::___getLegibleString($mValue, $iStringLengthLimit, false) : $mValue;
        return self::_getArrayRepresentationSanitized(print_r($mValue, true));
    }
    static private function ___getLegibleDetailedCallable($asoCallable) {
        return '(callable) ' . self::___getCallableName($asoCallable);
    }
    static public function ___getCallableName($asoCallable) {
        if (is_string($asoCallable)) {
            return $asoCallable;
        }
        if (is_object($asoCallable)) {
            return get_class($asoCallable);
        }
        $_sSubject = is_object($asoCallable[0]) ? get_class($asoCallable[0]) : ( string )$asoCallable[0];
        return $_sSubject . '::' . ( string )$asoCallable[1];
    }
    static private function ___getLegibleDetailedObject($oObject) {
        if (method_exists($oObject, '__toString')) {
            return ( string )$oObject;
        }
        return '(object) ' . get_class($oObject) . ' ' . count(get_object_vars($oObject)) . ' properties.';
    }
    static private function ___getLegibleDetailedArray(array $aArray, $iStringLengthLimit = 0, $iDepthLimit = 0) {
        $_iDepthLimit = $iDepthLimit ? $iDepthLimit : self::$iLegibleArrayDepthLimit;
        return self::getArrayMappedRecursive(array(__CLASS__, 'getLegibleDetailedValue'), self::_getSlicedByDepth($aArray, $_iDepthLimit), array($iStringLengthLimit));
    }
    static public function getLegibleDetailedValue($mItem, $iStringLengthLimit) {
        if (is_callable($mItem)) {
            return self::___getLegibleDetailedCallable($mItem);
        }
        return is_scalar($mItem) ? self::___getLegibleDetailedScalar($mItem, $iStringLengthLimit) : self::___getLegibleDetailedNonScalar($mItem);
    }
    static private function ___getLegibleDetailedNonScalar($mNonScalar) {
        $_sType = gettype($mNonScalar);
        if (is_null($mNonScalar)) {
            return '(null)';
        }
        if (is_object($mNonScalar)) {
            return self::___getLegibleDetailedObject($mNonScalar);
        }
        if (is_array($mNonScalar)) {
            return '(' . $_sType . ') ' . count($mNonScalar) . ' elements';
        }
        return '(' . $_sType . ') ' . ( string )$mNonScalar;
    }
    static private function ___getLegibleDetailedScalar($sScalar, $iStringLengthLimit) {
        if (is_bool($sScalar)) {
            return '(boolean) ' . ($sScalar ? 'true' : 'false');
        }
        return is_string($sScalar) ? self::___getLegibleString($sScalar, $iStringLengthLimit, true) : '(' . gettype($sScalar) . ', length: ' . self::___getValueLength($sScalar) . ') ' . $sScalar;
    }
    static private function ___getValueLength($mValue) {
        $_sVariableType = gettype($mValue);
        if (in_array($_sVariableType, array('string', 'integer'))) {
            return strlen($mValue);
        }
        if ('array' === $_sVariableType) {
            return count($mValue);
        }
        return null;
    }
    static private function ___getLegibleString($sString, $iLengthLimit, $bShowDetails = true) {
        static $_iMBSupport;
        $_iMBSupport = isset($_iMBSupport) ? $_iMBSupport : ( integer )function_exists('mb_strlen');
        $_aStrLenMethod = array('strlen', 'mb_strlen');
        $_aSubstrMethod = array('substr', 'mb_substr');
        $iCharLimit = $iLengthLimit ? $iLengthLimit : self::$iLegibleStringCharacterLimit;
        $_iCharLength = call_user_func_array($_aStrLenMethod[$_iMBSupport], array($sString));
        if ($bShowDetails) {
            return $_iCharLength <= $iCharLimit ? '(string, length: ' . $_iCharLength . ') ' . $sString : '(string, length: ' . $_iCharLength . ') ' . call_user_func_array($_aSubstrMethod[$_iMBSupport], array($sString, 0, $iCharLimit)) . '...';
        }
        return $_iCharLength <= $iCharLimit ? $sString : call_user_func_array($_aSubstrMethod[$_iMBSupport], array($sString, 0, $iCharLimit));
    }
    static protected function _getArrayRepresentationSanitized($sString) {
        $sString = preg_replace('/\)(\r\n?|\n)(?=(\r\n?|\n)\s+[\[\)])/', ')', $sString);
        $sString = preg_replace('/Array(\r\n?|\n)\s+\((\r\n?|\n)\s+\)/', 'Array()', $sString);
        return $sString;
    }
    static public function getSlicedByDepth(array $aSubject, $iDepth = 0, $sMore = '(array truncated) ...') {
        return self::_getSlicedByDepth($aSubject, $iDepth, $sMore);
    }
    static private function _getSlicedByDepth(array $aSubject, $iDepth = 0, $sMore = '(array truncated) ...') {
        foreach ($aSubject as $_sKey => $_vValue) {
            if (is_array($_vValue)) {
                $_iDepth = $iDepth;
                if ($iDepth > 0) {
                    $aSubject[$_sKey] = self::_getSlicedByDepth($_vValue, --$iDepth);
                    $iDepth = $_iDepth;
                    continue;
                }
                if (strlen($sMore)) {
                    $aSubject[$_sKey] = $sMore;
                    continue;
                }
                unset($aSubject[$_sKey]);
            }
        }
        return $aSubject;
    }
    static public function getStackTrace($iSkip = 0, $_deprecated = null) {
        $_iSkip = 1;
        $_oException = new Exception();
        if (is_object($iSkip) && $iSkip instanceof Exception) {
            $_oException = $iSkip;
            $iSkip = ( integer )$_deprecated;
        }
        $_iSkip = $_iSkip + $iSkip;
        $_aTraces = array();
        $_aFrames = $_oException->getTrace();
        $_aFrames = array_slice($_aFrames, $_iSkip);
        foreach (array_reverse($_aFrames) as $_iIndex => $_aFrame) {
            $_aFrame = $_aFrame + array('file' => null, 'line' => null, 'function' => null, 'class' => null, 'args' => array(),);
            $_sArguments = self::___getArgumentsOfEachStackTrace($_aFrame['args']);
            $_aTraces[] = sprintf("#%s %s(%s): %s(%s)", $_iIndex + 1, $_aFrame['file'], $_aFrame['line'], isset($_aFrame['class']) ? $_aFrame['class'] . '->' . $_aFrame['function'] : $_aFrame['function'], $_sArguments);
        }
        return implode(PHP_EOL, $_aTraces) . PHP_EOL;
    }
    static private function ___getArgumentsOfEachStackTrace(array $aTraceArguments) {
        $_aArguments = array();
        foreach ($aTraceArguments as $_mArgument) {
            $_sType = gettype($_mArgument);
            $_sType = str_replace(array('resource (closed)', 'unknown type', 'integer', 'double',), array('resource', 'unknown', 'scalar', 'scalar',), $_sType);
            $_sMethodName = "___getStackTraceArgument_{$_sType}";
            $_aArguments[] = method_exists(__CLASS__, $_sMethodName) ? self:: {
                $_sMethodName
            }
            ($_mArgument) : $_sType;
        }
        return join(", ", $_aArguments);
    }
    static private function ___getStackTraceArgument_string($mArgument) {
        $_sString = self::___getLegibleString($mArgument, 200, true);
        return "'" . $_sString . "'";
    }
    static private function ___getStackTraceArgument_scalar($mArgument) {
        return $mArgument;
    }
    static private function ___getStackTraceArgument_boolean($mArgument) {
        return ($mArgument) ? "true" : "false";
    }
    static private function ___getStackTraceArgument_NULL($mArgument) {
        return 'NULL';
    }
    static private function ___getStackTraceArgument_object($mArgument) {
        return 'Object(' . get_class($mArgument) . ')';
    }
    static private function ___getStackTraceArgument_resource($mArgument) {
        return get_resource_type($mArgument);
    }
    static private function ___getStackTraceArgument_unknown($mArgument) {
        return gettype($mArgument);
    }
    static private function ___getStackTraceArgument_array($mArgument) {
        $_sOutput = '';
        $_iMax = 10;
        $_iTotal = count($mArgument);
        $_iIndex = 0;
        foreach ($mArgument as $_sKey => $_mValue) {
            $_iIndex++;
            $_mValue = is_scalar($_mValue) ? self::___getLegibleDetailedScalar($_mValue, 100) : ucfirst(gettype($_mValue)) . (is_object($_mValue) ? ' (' . get_class($_mValue) . ')' : '');
            $_sOutput.= $_sKey . ': ' . $_mValue . ', ';
            if ($_iIndex > $_iMax && $_iTotal > $_iMax) {
                $_sOutput = rtrim($_sOutput, ',') . '...';
                break;
            }
        }
        $_sOutput = rtrim($_sOutput, ',');
        return "Array({$_sOutput})";
    }
    }
    class AdminPageFramework_Debug_Log extends AdminPageFramework_Debug_Base {
        static protected function _log($mValue, $sFilePath = null, $bStackTrace = false, $iTrace = 0, $iStringLengthLimit = 99999, $iArrayDepthLimit = 50) {
            static $_fPreviousTimeStamp = 0;
            $_oCallerInfo = debug_backtrace();
            $_sCallerFunction = self::___getCallerFunctionName($_oCallerInfo, $iTrace);
            $_sCallerClass = self::___getCallerClassName($_oCallerInfo, $iTrace);
            $_fCurrentTimeStamp = microtime(true);
            $_sLogContent = self::___getLogContents($mValue, $_fCurrentTimeStamp, $_fPreviousTimeStamp, $_sCallerClass, $_sCallerFunction, $iStringLengthLimit, $iArrayDepthLimit) . ($bStackTrace ? self::getStackTrace($iTrace + 1) : '') . PHP_EOL;
            file_put_contents(self::___getLogFilePath($sFilePath, $_sCallerClass), $_sLogContent, FILE_APPEND);
            $_fPreviousTimeStamp = $_fCurrentTimeStamp;
        }
        static private function ___getLogContents($mValue, $_fCurrentTimeStamp, $_fPreviousTimeStamp, $_sCallerClass, $_sCallerFunction, $iStringLengthLimit, $iArrayDepthLimit) {
            return self::___getLogHeadingLine($_fCurrentTimeStamp, round($_fCurrentTimeStamp - $_fPreviousTimeStamp, 3), $_sCallerClass, $_sCallerFunction) . PHP_EOL . self::_getLegibleDetails($mValue, $iStringLengthLimit, $iArrayDepthLimit) . PHP_EOL;
        }
        static private function ___getCallerFunctionName($oCallerInfo, $iTrace) {
            return self::getElement($oCallerInfo, array(2 + $iTrace, 'function'), '');
        }
        static private function ___getCallerClassName($oCallerInfo, $iTrace) {
            return self::getElement($oCallerInfo, array(2 + $iTrace, 'class'), '');
        }
        static private function ___getLogFilePath($bsFilePathOrName, $sCallerClass) {
            $_sWPContentDir = WP_CONTENT_DIR . DIRECTORY_SEPARATOR;
            if (is_string($bsFilePathOrName) && !self::hasSlash($bsFilePathOrName)) {
                return $_sWPContentDir . $bsFilePathOrName . '_' . date("Ymd") . '.log';
            }
            $_bFileExists = self::___createFile($bsFilePathOrName);
            if ($_bFileExists) {
                return $bsFilePathOrName;
            }
            $_sClassBaseName = $sCallerClass ? basename($sCallerClass) : basename(get_class());
            return $_sWPContentDir . $_sClassBaseName . '_' . date("Ymd") . '.log';
        }
        static private function ___createFile($sFilePath) {
            if (!$sFilePath || true === $sFilePath) {
                return false;
            }
            if (file_exists($sFilePath)) {
                return true;
            }
            $_bhResource = fopen($sFilePath, 'w');
            return ( boolean )$_bhResource;
        }
        static private function ___getLogHeadingLine($fCurrentTimeStamp, $nElapsed, $sCallerClass, $sCallerFunction) {
            $_nNow = $fCurrentTimeStamp + (self::___getSiteGMTOffset() * 60 * 60);
            $_nMicroseconds = str_pad(round(($_nNow - floor($_nNow)) * 10000), 4, '0');
            $_aOutput = array(date("Y/m/d H:i:s", $_nNow) . '.' . $_nMicroseconds, self::___getFormattedElapsedTime($nElapsed), self::___getPageLoadID(), self::getFrameworkVersion(), $sCallerClass . '::' . $sCallerFunction, current_filter(), self::getCurrentURL(),);
            return implode(' ', $_aOutput);
        }
        static private function ___getSiteGMTOffset() {
            static $_nGMTOffset;
            $_nGMTOffset = isset($_nGMTOffset) ? $_nGMTOffset : get_option('gmt_offset');
            return $_nGMTOffset;
        }
        static private function ___getPageLoadID() {
            static $_sPageLoadID;
            $_sPageLoadID = $_sPageLoadID ? $_sPageLoadID : uniqid();
            return $_sPageLoadID;
        }
        static private function ___getFormattedElapsedTime($nElapsed) {
            $_aElapsedParts = explode(".", ( string )$nElapsed);
            $_sElapsedFloat = str_pad(self::getElement($_aElapsedParts, 1, 0), 3, '0');
            $_sElapsed = self::getElement($_aElapsedParts, 0, 0);
            $_sElapsed = strlen($_sElapsed) > 1 ? '+' . substr($_sElapsed, -1, 2) : ' ' . $_sElapsed;
            return $_sElapsed . '.' . $_sElapsedFloat;
        }
    }
    class AdminPageFramework_Debug extends AdminPageFramework_Debug_Log {
        static public function dump($asArray, $sFilePath = null, $bStackTrace = false, $iStringLengthLimit = 0, $iArrayDepthLimit = 0) {
            echo self::get($asArray, $sFilePath, true, $bStackTrace, $iStringLengthLimit, $iArrayDepthLimit);
        }
        static public function getDetails($mValue, $bEscape = true, $bStackTrace = false, $iStringLengthLimit = 0, $iArrayDepthLimit = 0) {
            $_sValueWithDetails = self::_getArrayRepresentationSanitized(self::_getLegibleDetails($mValue, $iStringLengthLimit, $iArrayDepthLimit));
            $_sValueWithDetails = $bStackTrace ? $_sValueWithDetails . PHP_EOL . self::getStackTrace() : $_sValueWithDetails;
            return $bEscape ? "<pre class='dump-array'>" . htmlspecialchars($_sValueWithDetails) . "</pre>" : $_sValueWithDetails;
        }
        static public function get($asArray, $sFilePath = null, $bEscape = true, $bStackTrace = false, $iStringLengthLimit = 0, $iArrayDepthLimit = 0) {
            if ($sFilePath) {
                self::log($asArray, $sFilePath);
            }
            $_sContent = self::_getLegible($asArray, $iStringLengthLimit, $iArrayDepthLimit) . ($bStackTrace ? PHP_EOL . self::getStackTrace() : '');
            return $bEscape ? "<pre class='dump-array'>" . htmlspecialchars($_sContent) . "</pre>" : $_sContent;
        }
        static public function log($mValue, $sFilePath = null, $bStackTrace = false, $iTrace = 0, $iStringLengthLimit = 99999, $iArrayDepthLimit = 50) {
            self::_log($mValue, $sFilePath, $bStackTrace, $iTrace, $iStringLengthLimit, $iArrayDepthLimit);
        }
        static public function dumpArray($asArray, $sFilePath = null) {
            self::showDeprecationNotice('AdminPageFramework_Debug::' . __FUNCTION__, 'AdminPageFramework_Debug::dump()');
            AdminPageFramework_Debug::dump($asArray, $sFilePath);
        }
        static public function getArray($asArray, $sFilePath = null, $bEscape = true) {
            self::showDeprecationNotice('AdminPageFramework_Debug::' . __FUNCTION__, 'AdminPageFramework_Debug::get()');
            return AdminPageFramework_Debug::get($asArray, $sFilePath, $bEscape);
        }
        static public function logArray($asArray, $sFilePath = null) {
            self::showDeprecationNotice('AdminPageFramework_Debug::' . __FUNCTION__, 'AdminPageFramework_Debug::log()');
            AdminPageFramework_Debug::log($asArray, $sFilePath);
        }
        static public function getAsString($mValue) {
            self::showDeprecationNotice('AdminPageFramework_Debug::' . __FUNCTION__);
            return self::_getLegible($mValue);
        }
    }
    